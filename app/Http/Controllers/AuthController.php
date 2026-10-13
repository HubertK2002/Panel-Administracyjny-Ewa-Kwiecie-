<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'password' => ['required', 'string'],
        ], [
            'password.required' => 'Wpisz hasło, aby kontynuować.',
        ]);

        $configuredPassword = (string) config('admin.password');
        $valid = str_starts_with($configuredPassword, '$2y$') || str_starts_with($configuredPassword, '$argon2')
            ? Hash::check($validated['password'], $configuredPassword)
            : ($configuredPassword !== '' && hash_equals($configuredPassword, $validated['password']));

        if (! $valid) {
            return back()->withErrors(['password' => 'To hasło jest nieprawidłowe.'])->onlyInput();
        }

        $request->session()->regenerate();
        $request->session()->put('admin_authenticated', true);

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
