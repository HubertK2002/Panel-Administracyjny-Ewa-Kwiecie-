@extends('layouts.app')

@section('title', 'Dashboard')

@section('body')
<div class="shell">
    @include('partials.sidebar')
    <main class="main">
        @include('partials.topbar')
        <div class="content">
            <div class="intro"><div><div class="eyebrow">PANEL EWY · {{ now()->translatedFormat('j F Y') }}</div><h1>Dzień dobry, Ewo 👋</h1><p class="lede">Tutaj sprawdzisz zgłoszenia od rodziców i zarządzisz placówkami, w których prowadzisz zajęcia.</p></div></div>
            <div class="cards">
                <a class="card" href="{{ route('submissions.index') }}"><div class="card-top"><div class="card-icon">▤</div><span class="arrow">↗</span></div><h2>Zobacz zgłoszenia</h2><p>Sprawdzaj zgłoszenia rodziców na Twoje zajęcia.</p><div class="card-meta">Przejdź do zgłoszeń&nbsp; →</div></a>
                <a class="card" href="{{ route('kindergartens.index') }}"><div class="card-top"><div class="card-icon">⌂</div><span class="arrow">↗</span></div><h2>Zarządzaj przedszkolami</h2><p>Dodawaj placówki, w których odbywają się zajęcia.</p><div class="card-meta">{{ $kindergartenCount }} {{ $kindergartenCount === 1 ? 'placówka' : ($kindergartenCount % 10 >= 2 && $kindergartenCount % 10 <= 4 && ($kindergartenCount % 100 < 12 || $kindergartenCount % 100 > 14) ? 'placówki' : 'placówek') }}&nbsp; · &nbsp;Zarządzaj →</div></a>
            </div>
            <div class="stat-strip"><span class="stat-number">{{ $kindergartenCount }}</span><span class="stat-dot"></span><span>{{ $kindergartenCount === 1 ? 'przedszkole jest' : 'przedszkola są' }} w Twojej bazie</span><a href="https://impro.ewakwiecien.pl/" target="_blank" rel="noopener noreferrer" style="margin-left:auto;color:#315d4f;font-weight:650">Otwórz stronę zapisów ↗</a></div>
        </div>
    </main>
</div>
@endsection
