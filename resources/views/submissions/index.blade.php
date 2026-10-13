@extends('layouts.app')

@section('title', 'Zgłoszenia')

@section('body')
<div class="shell">
    @include('partials.sidebar')
    <main class="main">
        @include('partials.topbar')
        <div class="content">
            <div class="intro"><div><div class="eyebrow">ZAPISY NA ZAJĘCIA</div><h1>Zgłoszenia</h1><p class="lede">Zgłoszenia rodziców będą dostępne w tym miejscu.</p></div></div>
            <section class="panel"><div class="empty"><div class="empty-icon">✉</div><strong>Brak podłączonych zgłoszeń</strong><div>Formularz zapisów znajduje się na stronie Ewy. Połączenie go z panelem pozwoli wyświetlać tu nowe zgłoszenia.</div><p style="margin:14px 0 0"><a href="https://impro.ewakwiecien.pl/" target="_blank" rel="noopener noreferrer" style="color:#315d4f;font-weight:650">Otwórz stronę Ewy ↗</a></p></div></section>
        </div>
    </main>
</div>
@endsection
