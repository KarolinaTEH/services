

@component('mail::message')
 
# Cześć  {{ array_get($profile, "fname") }},

**Dzisiaj do 12:00 jest DEADLINE na dodanie przedstawicieli Wystawcy, którzy będą reprezentować firmę na Stoisku.** 

O 12:01 wysyłamy identyfikatory do druku!

# Lista zdefiniowanych osób

@forelse($representatives as $rep)

	{{$rep->translate("[[fname]] [[lname]] [[position]]")}}

@empty

**Jeszcze nie zdefiniowano przedstawicieli**

@endforelse

@component('mail::button', ['url' => $accountUrlReps])
Dodaj / usuń Przedstawicieli 
@endcomponent

Przypominamy, że w ramach wykupionej jednej przestrzeni wystawienniczej otrzymujesz maksymalnie 4 vouchery obiadowe w cenie stoiska i 1 kartę parkingową. 

**Jeśli Przedstawicieli jest więcej niź 4 - dokup proszę vouchery obiadowe** (Panel wystawcy -> Udział w Targach -> Dodatkowe vouchery)

Pozdrawiam,

{{$footer}}

@endcomponent



