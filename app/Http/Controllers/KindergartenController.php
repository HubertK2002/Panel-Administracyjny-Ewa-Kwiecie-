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
            'kindergartens' => Kindergarten::query()->latest('created_at')->get(),
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

        Kindergarten::create([
            'nazwa' => $validated['name'],
            'miejscowosc' => $validated['town'],
            'ulica' => $validated['street'],
            'numer' => $validated['street_number'],
            'kod_pocztowy' => $validated['postal_code'],
        ]);

        return redirect()->route('kindergartens.index')->with('success', 'Przedszkole zostało dodane.');
    }
}
