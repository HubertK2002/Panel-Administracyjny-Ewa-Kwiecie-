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
- placówki zapisywane w bazie MariaDB.

## Nginx na Raspberry Pi

Gotowy vhost znajduje się w `deploy/nginx/panel.ewakwiecien.pl.conf`. Skopiuj go na serwer do `/etc/nginx/sites-available/panel.ewakwiecien.pl`, włącz konfigurację i sprawdź ją przed przeładowaniem:

```bash
sudo ln -s /etc/nginx/sites-available/panel.ewakwiecien.pl /etc/nginx/sites-enabled/panel.ewakwiecien.pl
sudo nginx -t
sudo systemctl reload nginx
```

Konfiguracja zakłada rekord DNS `panel.ewakwiecien.pl` wskazujący na ten sam serwer oraz certyfikat obejmujący `*.ewakwiecien.pl`. Katalog projektu powinien być dostępny dla użytkownika PHP-FPM, a aplikacja musi mieć skonfigurowane `.env` i wykonane migracje.
