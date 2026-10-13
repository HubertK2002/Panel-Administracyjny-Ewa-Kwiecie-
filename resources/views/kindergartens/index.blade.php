@extends('layouts.app')

@section('title', 'Zarządzaj przedszkolami')

@section('body')
<div class="shell">
    @include('partials.sidebar')
    <main class="main">
        @include('partials.topbar')
        <div class="content">
            <div class="intro"><div><div class="eyebrow">BAZA PLACÓWEK</div><h1>Przedszkola</h1><p class="lede">Dodawaj placówki i zarządzaj ich danymi adresowymi.</p></div></div>
            @if (session('success'))<div class="flash" role="status">{{ session('success') }}</div>@endif
            <div class="manage-grid">
                <section class="panel">
                    <h2>Dodaj przedszkole</h2><p class="panel-desc">Wpisz nazwę oraz uzupełnij każdą część adresu.</p>
                    <form method="post" action="{{ route('kindergartens.store') }}">
                        @csrf
                        <div class="field"><label for="name">Nazwa przedszkola</label><input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="np. Przedszkole nr 2 im. Stanisławy Modrzejewskiej" maxlength="180" required>@error('name')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="field"><label for="town">Miejscowość</label><input id="town" name="town" type="text" value="{{ old('town') }}" placeholder="np. Dębno" maxlength="120" required>@error('town')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="field"><label for="street">Ulica</label><input id="street" name="street" type="text" value="{{ old('street') }}" placeholder="np. Jana Pawła II" maxlength="180" required>@error('street')<div class="error">{{ $message }}</div>@enderror</div>
                        <div class="fields-row"><div class="field"><label for="street_number">Numer</label><input id="street_number" name="street_number" type="text" value="{{ old('street_number') }}" placeholder="np. 42" maxlength="20" required>@error('street_number')<div class="error">{{ $message }}</div>@enderror</div><div class="field"><label for="postal_code">Kod pocztowy</label><input id="postal_code" name="postal_code" type="text" inputmode="numeric" pattern="[0-9]{2}-[0-9]{3}" value="{{ old('postal_code') }}" placeholder="00-000" maxlength="6" required>@error('postal_code')<div class="error">{{ $message }}</div>@enderror</div></div>
                        <button class="button" type="submit">＋&nbsp; Dodaj przedszkole</button>
                    </form>
                </section>
                <section class="panel">
                    <div class="list-head"><div><h2>Twoje przedszkola</h2><p class="panel-desc" style="margin:4px 0 0">Lista wszystkich dodanych placówek.</p></div><span class="count-pill">{{ $kindergartens->count() }} {{ $kindergartens->count() === 1 ? 'placówka' : ($kindergartens->count() % 10 >= 2 && $kindergartens->count() % 10 <= 4 && ($kindergartens->count() % 100 < 12 || $kindergartens->count() % 100 > 14) ? 'placówki' : 'placówek') }}</span></div>
                    @forelse ($kindergartens as $kindergarten)
                        <article class="kindergarten"><div class="kindergarten-mark">⌂</div><div><h3>{{ $kindergarten->nazwa }}</h3><p>{{ $kindergarten->ulica }} {{ $kindergarten->numer }}
{{ $kindergarten->kod_pocztowy }} {{ $kindergarten->miejscowosc }}</p></div></article>
                    @empty
                        <div class="empty"><div class="empty-icon">⌂</div><strong>Jeszcze tu pusto</strong><div>Dodaj pierwsze przedszkole za pomocą formularza.</div></div>
                    @endforelse
                </section>
            </div>
        </div>
    </main>
</div>
@endsection
