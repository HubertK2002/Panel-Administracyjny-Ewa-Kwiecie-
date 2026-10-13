@extends('layouts.app')

@section('title', 'Zgłoszenia')

@section('body')
<div class="shell">
    @include('partials.sidebar')
    <main class="main">
        @include('partials.topbar')
        <div class="content">
            <div class="intro"><div><div class="eyebrow">ZAPISY NA ZAJĘCIA</div><h1>Zgłoszenia</h1><p class="lede">Zgłoszenia rodziców zapisujących dzieci na zajęcia.</p></div></div>
            <section class="panel">
                <div class="list-head"><div><h2>Lista zgłoszeń</h2><p class="panel-desc" style="margin:4px 0 0">Najnowsze zgłoszenia są wyświetlane jako pierwsze.</p></div><span class="count-pill">{{ $submissions->count() }} zgłoszeń</span></div>
                @forelse ($submissions as $submission)
                    <article class="kindergarten">
                        <div class="kindergarten-mark">✉</div>
                        <div>
                            <h3>{{ $submission->imie_dziecka }} {{ $submission->nazwisko_dziecka }}</h3>
                            <p><strong>Rodzic:</strong> {{ $submission->imie_rodzica }} {{ $submission->nazwisko_rodzica }}<br>
                                <strong>Wiek:</strong> {{ $submission->wiek_dziecka }} · <strong>Grupa:</strong> {{ $submission->nazwa_grupy }}<br>
                                <strong>Telefon:</strong> <a href="tel:{{ $submission->telefon }}">{{ $submission->telefon }}</a> · <strong>E-mail:</strong> <a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a><br>
                                <strong>Przedszkole:</strong> {{ $submission->kindergarten?->nazwa ?? 'Nie przypisano' }}<br>
                                <strong>Data zgłoszenia:</strong> {{ $submission->data_zgloszenia?->format('d.m.Y H:i') ?? '—' }}
                            </p>
                        </div>
                    </article>
                @empty
                    <div class="empty"><div class="empty-icon">✉</div><strong>Brak zgłoszeń</strong><div>Gdy rodzice wyślą zgłoszenie przez formularz, pojawi się ono tutaj.</div></div>
                @endforelse
            </section>
        </div>
    </main>
</div>
@endsection
