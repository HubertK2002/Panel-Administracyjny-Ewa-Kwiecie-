<aside class="sidebar">
    <a class="brand" href="{{ route('dashboard') }}">
        <span class="brand-mark">✿</span>
        <span class="brand-name">Ewa Kwiecień<span class="brand-caption">panel administracyjny</span></span>
    </a>
    <div>
        <div class="nav-label">Menu główne</div>
        <nav class="nav" aria-label="Menu główne">
            <a href="https://impro.ewakwiecien.pl/" target="_blank" rel="noopener noreferrer"><span class="nav-icon">↗</span>Strona zapisów</a>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><span class="nav-icon">⌂</span>Panel główny</a>
            <a href="{{ route('submissions.index') }}" class="{{ request()->routeIs('submissions.*') ? 'active' : '' }}"><span class="nav-icon">▤</span>Zgłoszenia</a>
            <a href="{{ route('kindergartens.index') }}" class="{{ request()->routeIs('kindergartens.*') ? 'active' : '' }}"><span class="nav-icon">⌂</span>Przedszkola</a>
        </nav>
    </div>
    <div class="sidebar-bottom"><div class="workspace-label">Prywatna przestrzeń</div><div class="workspace-name">Ewa Kwiecień</div></div>
</aside>
