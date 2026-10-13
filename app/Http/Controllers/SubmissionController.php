<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\View\View;

class SubmissionController extends Controller
{
    public function index(): View
    {
        return view('submissions.index', [
            'submissions' => Submission::query()
                ->with('kindergarten')
                ->orderByDesc('data_zgloszenia')
                ->get(),
        ]);
    }
}
