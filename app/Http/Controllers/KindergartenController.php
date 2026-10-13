<?php

namespace App\Http\Controllers;

use App\Models\Kindergarten;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KindergartenController extends Controller
{
    public function index(): View
    {
        return view('kindergartens.index', [
            'kindergartens' => Kindergarten::query()->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:180'],
            'town' => ['required', 'string', 'max:120'],
            'street' => ['required', 'string', 'max:180'],
            'street_number' => ['required', 'string', 'max:20'],
            'postal_code' => ['required', 'regex:/^\d{2}-\d{3}$/'],
        ], [
            'name.required' => 'Podaj nazwę przedszkola.',
            'name.max' => 'Nazwa może mieć maksymalnie 180 znaków.',
            'town.required' => 'Podaj miejscowość.',
            'street.required' => 'Podaj ulicę.',
            'street_number.required' => 'Podaj numer budynku.',
            'postal_code.required' => 'Podaj kod pocztowy.',
            'postal_code.regex' => 'Kod pocztowy wpisz w formacie 00-000.',
        ]);

        Kindergarten::create($validated + [
            'address' => $validated['street'].' '.$validated['street_number']."\n".$validated['postal_code'].' '.$validated['town'],
        ]);

        return redirect()->route('kindergartens.index')->with('success', 'Przedszkole zostało dodane.');
    }
}
