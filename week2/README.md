# Lesopdrachten week 2

## Onderwerpen 

- [GET](https://www.php.net/manual/en/reserved.variables.get.php)
- [POST](https://www.php.net/manual/en/reserved.variables.post.php)
- [isset()](https://www.php.net/manual/en/function.isset)

# Opdrachten

De startcode van de opdrachten staat in de map [start](start). De opdrachten zijn als volgt:

## Music collection - [details](start)

Voeg aan elke rij in de tabel van [index](start/index.php) een "Detail" link toe. Je kunt een extra kolom toevoegen
met een "detail" link erin of je kunt de naam van het album veranderen in een link die naar de details van dat 
album linkt. Deze detailpagina bevat alleen de gegevens van het album dat aangeklikt is. De 
[detailpagina](start/details.php) is al voor je aangemaakt.

### require

Aangezien je op de indexpagina en op de detailpagina dezelfde data van de muziekalbums nodig hebt, is het verstandig
om deze data te hergebruiken door gebruik te maken van een ```require_once()```.
De data van de albuminformatie staat al in een apart bestand in de map 
[includes/music-data.php](start/includes/music-data.php). Importeer deze data in index.php en 
details.php met behulp van de functie ```require_once()```.

## Music collection - [create](start)

Voeg een "Create" link toe, boven de tabel. Na het aanklikken van de link wordt de bijbehorende createpagina geladen 
met een formulier waarvan de velden overeenkomen met de gegevens van een album. De createpagina zal je nog in de map 
start moeten aanmaken.

# Oefeningen

De oefeningen (met startcode) staan in de map [exercises](exercises). De oefeningen zijn als volgt:

## GET

**Opdracht 1** 

In [pagina1](exercises/opdr1-get-pagina1.html) staat een link die informatie moet doorgeven naar 
[pagina2](exercises/opdr1-get-pagina2.php). Maak pagina1 kloppend zodat op pagina2 de tekst "Geweldig, het is 
gelukt om de tag 'techniek' door te sturen." komt te staan.

**Opdracht 2**

Op [pagina1](exercises/opdr2-get-pagina1.html) kun je klikken op de Blue Pill of de Red Pill. Maak zowel
[pagina1](exercises/opdr2-get-pagina1.html) als [pagina2](exercises/opdr2-get-pagina2.php) kloppend, zodat pagina2 de 
naam van de aangeklikte Pill laat zien.

## POST

**Opdracht 3**

Pas [pagina1](exercises/opdr3-post-pagina1.html) aan zodat je ingevulde voornaam getoond wordt op 
[pagina2](exercises/opdr3-post-pagina2.php). 

**Opdracht 4 - Postback**

Zorg ervoor dat de data van het formulier verzonden wordt naar [dezelfde pagina](exercises/opdr4-post-postback.php). 
Je kunt deze pagina dus op 2 manieren bezoeken
- (GET) Het formulier is dan nog leeg en er is nog niet op "submit" geklikt
- (POST) Het formulier is verzonden (door klik op "submit"). De $_POST array bevat alle data. 
De functie [```isset()```](https://www.php.net/manual/en/function.isset) kun je gebruiken om te controleren of het 
formulier verzonden is op de volgende manier:
```php
if(isset($_POST['submit'])) {
    // Post data uitlezen
}
```

