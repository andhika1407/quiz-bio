<?php

namespace App\Http\Controllers;

use App\Models\QuizAnswer;
use Illuminate\Http\Request;

class QuizAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizAnswers = QuizAnswer::with(['quizAttempt', 'question'])->get();
        return response()->json($quizAnswers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QuizAnswer $quizAnswer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuizAnswer $quizAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuizAnswer $quizAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuizAnswer $quizAnswer)
    {
        //
    }
}
