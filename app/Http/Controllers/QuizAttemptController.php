<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuizAttempts;
use App\Models\QuizAnswer;
use App\Models\QuestionOption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuizAttemptController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $quiz_attempts = QuizAttempts::with(['competition', 'answers'])->get();
    return response()->json($quiz_attempts);
  }

  public function show(String $id)
  {
    $question = Question::with('options')->findOrFail($id);
    $quiz_attempt = QuizAttempts::with(['competition.questions.options', 'answers'])
      ->where('competition_id', $question->competition_id)
      ->first();
    $question_list = $quiz_attempt->competition->questions->pluck('id');


    return view('quiz', [
      'current_question' => $question,
      'all_questions' => $question_list,
      'quiz_attempt' => $quiz_attempt
    ]);
  }

  public function start(Request $request)
  {
    $data = $request->validate([
      'user_id' => 'required|integer',
      'competition_id' => 'required|integer',
    ]);

    // $existingAttempt = QuizAttempts::where('user_id', $data['user_id'])
    //     ->where('competition_id', $data['competition_id'])
    //     ->whereNull('finished_at')
    //     ->exists();

    // if ($existingAttempt) {
    //     return response()->json(['message' => 'You already have an active quiz attempt for this competition.'], 400);
    // }

    $quiz_attempt = QuizAttempts::create([
      'user_id' => $data['user_id'],
      'competition_id' => $data['competition_id'],
      'started_at' => now(),
    ]);

    $question = $quiz_attempt->competition->questions()->with(['options'])->first();


    $question_list = $quiz_attempt->competition->questions->pluck('id')->toArray();

    $quiz_answer_data = [];

    foreach ($question_list as $qty) {
      $quiz_answer_data[] = [
        'quiz_attempt_id' => $quiz_attempt->id,
        'question_id' => $qty,
        'user_answer' => null,
      ];
    }


    QuizAnswer::insert($quiz_answer_data);

    // return view('/quiz', [
    //     'current_question' => $question,
    //     'all_questions' => $question_list,
    //     'quiz_attempt' => $quiz_attempt
    // ]);

    return redirect()->route('show.quiz',  ['id' => $question->id]);;
  }

  public function save(Request $request)
  { // function ini dipanggil tiap user klik maju, mundur, atau klik nomor soal

    // save dulu jawaban yang sekarang

    // cek tombol mana yang di klik

    // cari datanya berdasarkan hasil kliknya

    // kembaliin view yang isi data tadi


    // kode di generate AI, jadi nyimeng dikit

    $validated = $request->validate([
      'current_question_id' => 'required|exists:questions,id',
      'current_attempt_id' => 'required|exists:quiz_attempts,id',
      'answer' => 'nullable',
      'status' => 'nullable|in:answered,flagged,empty',
    ]);

    $user_answer = null;
    $status = $validated['status'] ?? 'empty';

    if (!empty($validated['answer'])) {
      $user_answer_record = QuestionOption::where('question_id', $validated['current_question_id'])
        ->where('id', $validated['answer'])
        ->first();

      if ($user_answer_record) {
        $user_answer = $user_answer_record->option_text;
        $status = $validated['status'] ?? 'answered';
      }
    }
    QuizAnswer::updateOrInsert(
      [
        'quiz_attempt_id' => $validated['current_attempt_id'],
        'question_id' => $validated['current_question_id'],
      ],
      [
        'user_answer' => $user_answer,
        'status' => $status,
        'created_at' => now(),
      ]
    );

    // nanti di view bakal ada 
    // <button type="submit" name="action" value="prev">Previous</button>   atau
    // button type="submit" name="target_question_id" value="{{ $q->id }}"

    if ($request->has('action')) {
      switch ($request->action) {
        case 'next':
          $nextQuestion = Question::where('id', $validated['current_question_id'] + 1)->first();


          return redirect()->route('show.quiz', [
            'id' => $nextQuestion?->id ?? $validated['current_question_id']
          ]);

        case 'prev':
          $prevQuestion = Question::where('id', $validated['current_question_id'] - 1)->first();

          return redirect()->route('show.quiz', [
            'id' => $prevQuestion?->id ?? $validated['current_question_id']
          ]);

        case 'number':
          return redirect()->route('quiz.results');
      }
    }

    if ($request->has('target_question_id')) {
      return redirect()->route('quiz.show', ['question_id' => $request->target_question_id]);
    }
  }

  public function finish(Request $request)
  {
    // return view('/result');
    //ambil data dari view langsung validasi
    $validated = $request->validate([
      'current_attempt_id' => 'required',
      'all_questions' => 'required',
    ]);


    // querry question, dan jawaban yang sudah diisi user, 
    $quiz_attempt = QuizAttempts::with([
      'competition.questions',
      'answers'
    ])->findOrFail($validated['current_attempt_id']); //ini quiz attempt dari user id 2
    $question_list = $quiz_attempt->competition->questions; // array berupa int dari id question

    //cocokin quiestiokey dengan quiz_answer lakukan dengan loop (hitung benar, salah, bistu jumlahin score kalau benar) note: kalau jawaban kosong, score tidak dihitung

    $total_correct = 0;
    $total_wrong = 0;
    $total_score = 0;

    foreach ($question_list as $question) {
      $answer = $quiz_attempt->answers->where('question_id', $question->id)->first();
      if ($answer) {
        if ($answer->user_answer === $question->correct_answer) {
          $total_correct++;
          $total_score += $question->score;
        } else {
          $total_wrong++;
        }
      };
    }

    // update quiz_attempt dengan total score, total benar, total salah, dan waktu selesai sekalian finished_at
    $test = QuizAttempts::where('id', $validated['current_attempt_id'])->update([
      'score' => $total_score,
      'correct_answer' => $total_correct,
      'wrong_answer' => $total_wrong,
      'finished_at' => now(),
    ]);
    dd($test);



    // redirect ke halaman hasil quiz
  }
}
