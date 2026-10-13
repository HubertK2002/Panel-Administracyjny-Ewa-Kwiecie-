@extends('layouts.app')

@section('title', 'Logowanie')

@section('body')
<main class="login-page">
    <section class="login-art">
        <div class="art-orb"></div>
        <a class="art-brand" href="{{ route('login') }}"><span class="brand-mark">✳</span><span class="brand-name">Ewa Kwiecień<span class="brand-caption" style="color:rgba(255,255,255,.62)">panel administracyjny</span></span></a>
        <div class="art-copy"><div class="eyebrow" style="color:#d6e4d9">STREFA EWY</div><h2>Twoje zajęcia. Wszystkie sprawy w jednym miejscu.</h2><p>Zaloguj się do prywatnego panelu zarządzania.</p></div>
        <div class="art-foot">© {{ date('Y') }} · małe sprawy</div>
    </section>
    <section class="login-side">
        <div class="login-box">
            <a class="brand" href="{{ route('home') }}"><span class="brand-mark">✳</span><span class="brand-name">Ewa Kwiecień<span class="brand-caption">panel administracyjny</span></span></a>
            <div class="eyebrow">STREFA ADMINISTRATORA</div>
            <h1>Witaj ponownie</h1>
            <p>Zaloguj się hasłem, aby przejść do panelu.</p>
            @if ($errors->any())<div class="login-error" role="alert">{{ $errors->first() }}</div>@endif
            <form method="post" action="{{ route('login.store') }}">
                @csrf
                <div class="field"><label for="password">Hasło dostępu</label><input id="password" name="password" type="password" autocomplete="current-password" placeholder="Wpisz swoje hasło" required autofocus></div>
                <button class="button" type="submit">Zaloguj się <span aria-hidden="true">→</span></button>
            </form>
            <div class="login-help">Dostęp jest przeznaczony wyłącznie dla upoważnionych osób.</div>
        </div>
    </section>
</main>
@endsection
