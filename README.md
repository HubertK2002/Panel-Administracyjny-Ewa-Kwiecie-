# Małe sprawy — panel przedszkoli

Prywatny panel administracyjny Ewy Kwiecień, zabezpieczony wspólnym hasłem. Formularz zapisów rodziców pozostaje na stronie impro.ewakwiecien.pl. Panel odczytuje zgłoszenia z `wp_zgloszenia` i przechowuje przedszkola w `wp_przedszkola` w bazie MariaDB `wordpress_ewa`.

## Uruchomienie

1. Skopiuj `.env.example` do `.env`.
2. Ustaw własne, mocne `ADMIN_PASSWORD` w `.env`.
3. Wygeneruj klucz aplikacji: `php artisan key:generate`.
4. Uruchom `database/sql/wordpress_ewa_schema.sql` na bazie `wordpress_ewa`, aby utworzyć tabelę przedszkoli i połączyć ją ze zgłoszeniami.
5. Utwórz pozostałe tabele aplikacji: `php artisan migrate`.
6. Uruchom aplikację: `php artisan serve`.

Logowanie do prywatnego panelu znajduje się na `/login`, a panel pod `/panel`. Stronę zapisów otworzysz przez link w menu panelu. Hasło może być przechowywane w `.env` jako tekst albo jako hash utworzony przez `Hash::make()`.

## Funkcje

- logowanie i wylogowanie z ochroną CSRF oraz ograniczeniem prób logowania;
- prywatny panel Ewy z podglądem zgłoszeń zapisanych w tabeli WordPressa `wp_zgloszenia`;
- dodawanie przedszkoli z osobnymi polami miejscowość, ulica, numer i kod pocztowy;
- placówki zapisywane w `wp_przedszkola`, z opcjonalnym powiązaniem zgłoszenia z przedszkolem przez `przedszkole_id`.

## Nginx na Raspberry Pi

Gotowy vhost znajduje się w `deploy/nginx/panel.ewakwiecien.pl.conf`. Skopiuj go na serwer do `/etc/nginx/sites-available/panel.ewakwiecien.pl`, włącz konfigurację i sprawdź ją przed przeładowaniem:

```bash
sudo ln -s /etc/nginx/sites-available/panel.ewakwiecien.pl /etc/nginx/sites-enabled/panel.ewakwiecien.pl
sudo nginx -t
sudo systemctl reload nginx
```

Konfiguracja zakłada rekord DNS `panel.ewakwiecien.pl` wskazujący na ten sam serwer oraz certyfikat obejmujący `*.ewakwiecien.pl`. Katalog projektu powinien być dostępny dla użytkownika PHP-FPM, a aplikacja musi mieć skonfigurowane `.env` i wykonane migracje.
