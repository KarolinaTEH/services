@component('mail::message')
 
# Cześć {{ array_get($profile, "fname")  }},

2 tematy.

(1)

Przygotowaliśmy zdjęcia z minionych Targów, które dotyczą Twojej firmy.

@component('mail::button', ['url' => $photosUrl ])
Pobierz zdjęcia (.zip)
@endcomponent

(2)

Przypominamy plan startu sprzedaży powierzchni wystawienniczej na 27. **Targi eHandlu (3 kwietnia 2025 w Warszawie - EXPO XXI)**


@component('mail::panel')

# Czwartek - 7 listopada 11:00

Start sprzedaży dla Twojej firmy (Wystawców spoza grona Top30 rankingu Konkursu dla Wystawców poprzedniej edycji Targów); Start otwartej sprzedaży.

[Układ hali, ceny](https://targiehandlu.pl/exhibit)


@endcomponent


## Do 16:00 dzisiaj (wtorek) - Sprzedaż większych powierzchni 

Sprzedaż dla Wystawców jesiennych Targów eHandlu zainteresowanych większą przestrzenią (3 i więcej stoisk) 

[Układ hali, ceny](https://targiehandlu.pl/exhibit)

**Prośba o info zwrotne jeśli Twoja firma jest zainteresowana min. 3 stoiskami. **



Pozdrowienia, 

{{$footer}}

@endcomponent

