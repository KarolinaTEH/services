

@component('mail::message')
 
# Dzień dobry {{ array_get($profile, "fname") }},

**Najstarsze i największe wydarzenie w Polsce - dotyczące sprzedaży online - powraca po blisko 2 latach (i trzech - odwołanych przez Rząd - edycjach).**

Po tak długim czasie od ostatniej fizycznej edycji Targów (Warszawa - 22 października 2019), pracując teraz nad jubileuszową edycją, towarzyszą nam emocje, które mieliśmy organizujać protoplastę Targów eHandlu czyli ogólnopolskie, otwarte, spotkania branży ehandlu - Shopcamp. ...ten motywujący dreszczyk emocji przy podejmowaniu każdej decyzji.

Formuła jesiennych Targów eHandlu będzie następująca:

- ok 120 Wystawców (kończymy kompletować listę - **zostało ok 11 stoisk**)

- aż 6 scen prezentacyjnych (2 duże, 2 otwarte, 2 "studyjne" pod tematy szkoleniowe) w których będziemy realizowali różne formuły edukacji

- strefa VIP (do której wejście będą mieli wybrani nie tylko Wystawcy i Prelegenci ale także wybrani przez nas Zwiedzający reprezentujący największych e-retailerów)

To co możesz zrobić na ten moment:

@component('mail::button', ['url' => "https://targiehandlu.pl/speaking"])
Wystąp / Zgłoś propozycję prezentacji
@endcomponent

@component('mail::button', ['url' => "https://targiehandlu.pl/visit"])
Zarejestruj się jako Zwiedzający
@endcomponent

@component('mail::button', ['url' => "https://targiehandlu.pl/exhibit"])
Zobacz plan stoisk / Wystawców
@endcomponent



<a href="https://targiehandlu.pl/speaking"><img src="https://res.cloudinary.com/eventjuicer/image/upload/v1630408054/emails/teh20_stage2.jpg" alt="stage" style="max-width: 600px;"></a>

<a href=""><img src="https://res.cloudinary.com/eventjuicer/image/upload/v1630408050/emails/teh20_stage1.jpg" alt="stage" style="max-width: 600px;"></a>

<a href="https://targiehandlu.pl/exhibit"><img src="https://res.cloudinary.com/eventjuicer/image/upload/v1630408049/emails/teh20_bookingmap.png" alt="booking map" style="max-width: 600px;"></a>



Z pozdrowieniami,

Karolina Michalak

Adam Zygadlewicz


**[Konfiguracja newslettera]({{ $unsubscribe }})**

@endcomponent








