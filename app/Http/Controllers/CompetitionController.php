<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = Competition::all();
        return view('competition.index', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competition.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree' => 'required|max:10',
            'nama' => 'required|max:200',
            'competition_start' => 'required|date',
            'competition_end' => 'required|date|after:competition_start'
        ]);

        Competition::create($validated);
        return redirect()->route('competition.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        return view('competition.form', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'degree' => 'required|max:10',
            'nama' => 'required|max:200',
            'competition_start' => 'required|date',
            'competition_end' => 'required|date|after:competition_start'
        ]);

        $competition->update($validated);
        return redirect()->route('competition.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        $competition->load('users');

        if ($competition->users->count() > 0) {
            return redirect()->route('competition.index')
                ->with('error', 'Kompetisi tidak dapat dihapus karena masih memiliki peserta.');
        }

        $competition->delete();
        return redirect()->route('competition.index');
    }
}
