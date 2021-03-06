<?php
return [
    // Format zgodny z php.net/date
    'date' => 'd.m.Y',
    'datetime' => 'd.m.Y H:i',
    // Oczekiwany format daty (wyświetlany użytkownikowi)
    'datetime-human' => 'DD.MM.YYYY HH:MM',
    'error' => [
        'back-to-index' => 'Wróć na stronę główną',
        'http' => [
            '403' => 'Dostęp zabroniony',
            '404' => 'Nie znaleziono strony',
            '405' => 'Niedozwolona metoda',
            '500' => 'Błąd serwera',
            '503' => 'Wracamy niedługo',
        ],
        'token-mismatch' => 'Przepraszamy, Twoja sesja wygasła. Spróbuj wysłać formularz ponownie.',
    ],
    'form' => [
        'no' => 'Nie',
        'yes' => 'Tak',
    ],
    'menu' => [
        'about' => 'O Codice',
        'add' => 'Dodaj',
        'calendar' => 'Kalendarz',
        'labels' => 'Etykiety',
        'logout' => 'Wyloguj',
        'plugins' => 'Wtyczki',
        'reminders' => 'Przypomnienia',
        'search-placeholder' => 'Szukaj lub filtruj',
        'settings' => 'Ustawienia',
        'stats' => 'Statystyki',
        'toggle' => 'Rozwiń menu',
    ],
    'noscript' => 'Codice posiada ograniczone możliwości przy wyłączonym JavaScripcie. Zachęcamy abyś jednak go włączył.',
];
