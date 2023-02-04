Overzicht van de lesopdrachten van week 5
-----------------------------------------

### Opdracht 1: Form data vullen

In deze opdracht ga je ervoor zorgen dat de inhoud van een formulier gevuld wordt op basis van een meegestuurd id (GET methode).

> [Pagina1.html](exercises/opdr1-pagina1.html) linkt naar pagina2.php en stuurt id=1 mee naar [pagina2.php](exercises/opdr1-pagina2.php). Vul (op pagina2.php) de betreffende velden van het formulier met de data uit de database voor dit specifieke album. Het id heb je nodig in de vraag die je aan de database stelt. Gebruik hiervoor de music\_collection database.

### Opdracht 2: UPDATE query

Open [PhpMyAdmin](http://localhost/phpmyadmin/) en klik op de database [music\_collection](http://localhost/phpmyadmin/index.php?route=/database/sql&db=music_collection) en vervolgens op de tabel [albums](http://localhost/phpmyadmin/index.php?route=/table/sql&db=music_collection&table=albums). Klik vervolgens op de tab 'SQL'.

> In de opdracht van vorige week zat een fout. Verander het aantal tracks van Pink Floyd (The Dark Side Of The Moon) van 9 naar 10. Schrijf hiervoor de bijbehorende UPDATE query.

Mocht je nog niet alle albums zien, klik dan op het tabblad 'Browse'.

> Pas een willekeurig album aan door op 'Edit' te klikken (achter gele potlood icon). Verander een waarde en druk op 'Go' / 'Starten'  
> Nu zie je een groene balk met de tekst: '1 row inserted.' / '1 rij toegevoegd.', dan is het gelukt. Hieronder staat een query. Vergelijk deze query met jouw query.

### Opdracht 3: Hidden field

Voor deze opdracht kan je gebruik maken van het voorbeeld `week5/examples/hidden-field`

> Voeg aan het formulier van opdr3-form.php een hidden field toe. Dmv een postback vang je de inhoud van het hidden field op en deze toon je vervolgens op dezelfde pagina in de HTML.

### Opdracht 4: Pseudo Code

In deze opdracht schrijf je de pseudo code voor de updatepagina. Hiervoor kun je (als hulpmiddel) gebruik maken van de werkmethode die je kunt vinden in Teams -> programmeren 2 -> Files.

> *   Schrijf de pseudo code van de pagina: update.php
> *   Neem de pseudo code over in je editor en plaats deze als comments bovenaan de update.php pagina van `week5/start/create.php`
>
>
> Disclaimer: het letterlijke antwoord op deze opdracht wordt niet door de docent gegeven omdat het nadrukkelijk onderdeel is van de beoordeling. Je kunt natuurlijk wel feedback vragen aan de docent of medestudenten.

### Opdracht 5: Update.php

Je hebt nu alle ingrediënten om de updatepagina te kunnen maken. Gebruik bij de uitwerking ook stap 4 uit de werkmethode. Loop je tegen een error aan, kijk dan of het Debugstroomdiagram je kunt helpen. Deze kun je vinden in Teams -> programmeren 2 -> Files.

> Werk de updatepagina uit, zodat je een album kunt toevoegen aan de database.
>
> *   Het formulier van de updatepagina wordt gevuld met albuminformatie van het specifieke album dat aangeklikt is op de indexpagina
> *   Alle velden zijn verplichte velden. Voeg server-side validatie toe
> *   Zijn niet alle velden ingevuld, toon dan een foutmelding
> *   Bij een foutmelding moeten de velden die goed waren, teruggeschreven worden in het formulier
> *   Na het succesvol aanpassen van de albuminformatie moet de gebruiker doorgestuurd worden naar de indexpagina. Hiervoor kan je gebruik maken van de PHP-functie [header()](https://www.php.net/manual/en/function.header.php)