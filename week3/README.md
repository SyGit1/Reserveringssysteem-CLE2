Lesopdrachten week 3

Overzicht van de lesopdrachten van week 3
-----------------------------------------

### Opdracht 1

In deze opdracht ga je oefenen met het ophalen van data uit de database. Hiervoor heb je eerst een database nodig. Er is al een database aangemaakt en deze is geëxporteerd in de vorm van een `.sql` bestand met de naam: `music_collection.sql` (in de map week3/exercises)

#### Importeer de database

*   Zorg ervoor dat (in XAMPP) de Apache en SQL server aanstaan
*   Download [music\_collection.sql](exercises/music_collection.sql)
*   Ga naar [PhpMyAdmin](http://localhost/phpmyadmin/)
*   Klik op 'Import' / 'Importeren'
*   Klik op 'Choose file' / 'Bestand kiezen' en selecteer de zojuist gedownloade music\_collection.sql
*   Klik vervolgens helemaal onderaan de pagina op de knop 'Import' / 'Starten'

#### Specifieke data selecteren met SQL

Via SQL ga je specifieke vragen stellen aan de database. Dit doe je d.m.v. een query en dan specifiek een [SELECT Statement](https://www.w3schools.com/sql/sql_select.asp).

Open de music\_collection database door op het 'plusje' voor de naam te klikken en klik vervolgens op de naam 'albums'. Klik nu bovenin op het tabblad 'SQL'. Hier kun je SQL-queries invoeren en zien welk resultaat de database als antwoord geeft. Let op! Het resultaat van een SELECT Statement is altijd een tabel, **ook als deze leeg is**.

> Formuleer voor onderstaande zinnen de juiste SELECT Statements en voer deze uit op de database.
>
> *   Toon alle albums. (Aantal 19)
> *   Toon alle albums met genre ‘Rock’. (Aantal: 7)
> *   Toon alle albums die meer dan 10 tracks bevatten. (Aantal: 17)
> *   Toon alle albums die meer dan 10 tracks bevatten en NA 2014 zijn uitgebracht. (Aantal: 9)
> *   Toon alle albums waarvan de artiest begint met een ‘H’. (Aantal: 3). Gebruik hierbij het [`LIKE`](https://www.w3schools.com/sql/sql_like.asp) keyword
> *   Toon de eerste 5 albums op alfabetische volgorde van de artiest. Gebruik hierbij de [`ORDER BY`](https://www.w3schools.com/sql/sql_orderby.asp) en [`LIMIT`](https://www.w3schools.com/mysql/mysql_limit.asp)

### Opdracht 2 - INDEX met database

Maak de indexpagina (zie de map 'start' in week3) voor de muziekalbums, maar nu gekoppeld aan de [database](https://www.khanacademy.org/computing/computer-programming/sql/sql-basics/pt/querying-the-table). Dit vervangt de multidimensionale array uit eerdere lessen. Gebruik hiervoor de database uit opdracht 1. Haal albumdata op uit de database en toon deze in (de bestaande) tabel.

Tip 1: in het bestand `week3/examples/database-query-flow.php` staat de volledige code beschreven (voorzien van comments) hoe je de data van álle albums uit de database haalt.  
Tip 2: in de map `week3/includes` staat het bestand `connection.php`. Dit is ook het bovenste deel van de code uit `database-query-flow.php`, dus let op dat je het niet dubbel doet. Deze kan je importeren met de PHP-functie `require_once`. Hierna is er verbinding gemaakt met de database. Dit kun je ook gebruiken bij de volgende opdracht (details.php) om verbinding te maken met de database.

### Opdracht 3 - DETAILS met database

Maak de detailpagina ook dynamisch vanuit de database. Laat de details zien van he specifieke album dat aangeklikt is.

Tip: Denk goed na welke informatie je moet doorsturen aan de detailpagina vanaf de indexpagina.

### Klaar met bovenstaande opdrachten? Ga met (één van) de volgende zaken verder:

*   De eindgebruiker wil nu maar maximaal 5 muziekalbums tegelijk op de index pagina zien. Maak gebruik van [paginatie](https://bulma.io/documentation/components/pagination/) om maar 5 albums per keer te bekijken.
*   Ga werken aan de create.php pagina. Let hier vooral op het toevoegen van validatie op alle velden. Gaat er iets fout, toon dan een foutmelding. Zorg er ook voor dat de eerder ingevulde velden niet verloren gaan.
*   Kijk nu of je dit zelf kunt uitbreiden door de informatie ook op te slaan in je database via een INSERT-query. (komt volgende week terug in de les!)
*   Ga alvast nadenken hoe je database voor je reserveringssysteem eruit moet komen te zien. Hier gaan we morgen tijdens CLE mee aan de slag.
