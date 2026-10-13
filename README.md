# Małe sprawy — panel przedszkoli

Prywatny panel administracyjny Ewy Kwiecień, zabezpieczony wspólnym hasłem. Formularz zapisów rodziców pozostaje na stronie impro.ewakwiecien.pl. Panel przechowuje bazę przedszkoli w SQLite.

## Uruchomienie

1. Skopiuj `.env.example` do `.env`.
2. Ustaw własne, mocne `ADMIN_PASSWORD` w `.env`.
3. Wygeneruj klucz aplikacji: `php artisan key:generate`.
4. Utwórz tabele: `php artisan migrate`.
5. Uruchom aplikację: `php artisan serve`.

Logowanie do prywatnego panelu znajduje się na `/login`, a panel pod `/panel`. Stronę zapisów otworzysz przez link w menu panelu. Hasło może być przechowywane w `.env` jako tekst albo jako hash utworzony przez `Hash::make()`.

## Funkcje

- logowanie i wylogowanie z ochroną CSRF oraz ograniczeniem prób logowania;
- prywatny panel Ewy z miejscem na zgłoszenia od rodziców;
- dodawanie przedszkoli z osobnymi polami miejscowość, ulica, numer i kod pocztowy;
- placówki zapisywane w bazie SQLite.
