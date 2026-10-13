<?php

namespace App\Http\Controllers;

use App\Models\Kindergarten;
use App\Models\Submission;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'kindergartenCount' => Kindergarten::count(),
            'submissionCount' => Submission::count(),
        ]);
    }
}
