<?php

include 'SimpleCalDAVClient.php';

$myClient = new SimpleCalDAVClient;

// Nom de l'utilisateur
$username = 'yolan';

// Mot de passe de l'utilisateur
$password = 'yolan';

// Nom d'un calendrier. Laisser vide si inconnu.
$calendarname = 'test';

// URL de base du server
$urlbase = 'http://baikal/cal.php/calendars/';

// URL de connexion
$url = $urlbase.$username.'/'.$calendarname;



// Connexion au server CavDAV
$myClient->connect($url, $username, $password);



// Créer un nouveau calendrier -- /!\ Ne fonctionne pas.
// $newcalname = 'The Brand New Calendar'
// $myClient->mkcal( 'http://baikal/cal.php/calendars/'.$username.'/', $newcalname);


// Affiche tous les calendriers disponibles
// foreach($myClient->findCalendars() as $aCal)
// {
// 	echo $aCal->__toString().'<br/>';
// }


// Selectionne un des calendriers. Nécessaire avant create() change() delete() getEvents() getTODOs()
$selectcalname = 'test';
$myClient->setCalendar($myClient->findCalendars()[$selectcalname]);


// Créer un nouvel event
// $myClient->create('BEGIN:VCALENDAR
// VERSION:2.0
// PRODID:-//www.marudot.com//iCal Event Maker
// X-WR-CALNAME:Réunion2
// CALSCALE:GREGORIAN
// BEGIN:VTIMEZONE
// TZID:Europe/Berlin
// TZURL:http://tzurl.org/zoneinfo-outlook/Europe/Berlin
// X-LIC-LOCATION:Europe/Berlin
// BEGIN:DAYLIGHT
// TZOFFSETFROM:+0100
// TZOFFSETTO:+0200
// TZNAME:CEST
// DTSTART:19700329T020000
// RRULE:FREQ=YEARLY;BYMONTH=3;BYDAY=-1SU
// END:DAYLIGHT
// BEGIN:STANDARD
// TZOFFSETFROM:+0200
// TZOFFSETTO:+0100
// TZNAME:CET
// DTSTART:19701025T030000
// RRULE:FREQ=YEARLY;BYMONTH=10;BYDAY=-1SU
// END:STANDARD
// END:VTIMEZONE
// BEGIN:VEVENT
// DTSTAMP:20150116T085600Z
// UID:20150116T085600Z-1543520316@marudot.com
// DTSTART;TZID="Europe/Berlin":20150116T120000
// DTEND;TZID="Europe/Berlin":20150117T120000
// SUMMARY:Réunion2
// DESCRIPTION:Réunion 2 aux polypodes
// LOCATION:Les Polypodes
// END:VEVENT
// END:VCALENDAR');


// Affiche tous les events du calendrier
foreach($myClient->getEvents() as $anEvnt)
{
	echo $anEvnt->getData().'<br/>'.'<br/>';
}


// Affiche le status de la réponse du server.
// echo $myClient->client->GetHttpResultCode();

// Affiche la réponse du server.
// echo $myClient->client->GetResponseHeaders();