@component('mail::message')

Hallo {{ array_get($profile, "fname")  }}, 

## Nur noch 7 Tage bis zum Wettbewerbstermin. Es ist wichtig, dass du diese Gelegenheit nutzt.

@component('mail::panel')

Um deine Chancen auf Erfolg zu maximieren, empfehlen wir dir, VIP-Einladungen zu versenden. Lade deine wichtigen Partner und potenziellen Kunden ein und gib ihnen Zugang zur exklusiven VIP-Zone mit bequemen Sitzmöglichkeiten und Erfrischungen.

Vergiss nicht deine RSVPs und noch ausstehende Einladungen, denn du möchtest keine Leads verpassen.

@component('mail::button', ['url' => $accountUrlVips])
Versende VIP-Einladungen an Partner und Kunden
@endcomponent

@endcomponent

# Ausstellerprofil

@component('mail::panel')
Teilt euer Ausstellerprofil auf euren Social-Media-Kanälen, um eure Fläche in der Mappe zu präsentieren und Einladungsanfragen für Meetings von den potentiellen Kunden zu erhalten)
@endcomponent

Die TOP 5 (14:40 Uhr) Unternehmen, die aktiv für ihre Präsenz auf der Expo werben und unsere Tools nutzen (mit zusätzlichen Dienstleistungen belohnt!), sind:

* Foxintelligence

* BigBuy

* iteo S.A.

* Allegro Sp. z o.o.

* Outvio OÜ

**Wir freuen uns sehr, dass ihr die Bedeutung der Lead-Generierung versteht und unsere Tools nutzt, um eure Präsenz auf der Veranstaltung zu maximieren!**

@component('mail::button', ['url' => $accountUrlPromotePublic])
Siehe Werbematerialien und Ranking-Seite
@endcomponent

@component('mail::panel')

An alle anderen da draußen, ihr habt noch Zeit, für eure Präsenz bei unserer Veranstaltung zu werben! **Am einfachsten geht das, indem ihr einfach den folgenden Link mit eurer PR- & Social-Media-Abteilung teilt** (Zugriff auf das restliche Aussteller-Panel ausgenommen).

{!! $accountUrlPromotePublic !!}

@endcomponent


Liebe Grüße, 

{{$footer}}

@endcomponent

