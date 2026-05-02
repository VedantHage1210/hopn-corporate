<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::query()->where('is_published', true)->latest()->paginate(15);

        return view('public.programs.index', compact('programs'));
    }

    public function show(string $lang, string $slug)
    {
        $program = Program::query()->where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('public.programs.show', compact('program'));
    }
}
