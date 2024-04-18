@component('mail::message')
 
# Cześć {{ array_get($profile, "fname")  }},

Oto plan dotyczący startu sprzedaży powierzchni wystawienniczej na 26. Targi eHandlu (25 października 2024 w Warszawie - EXPO XXI)

# Od dzisiaj do wtorku - Sprzedaż hurtowa powierzchni 

Sprzedaż dla Wystawców minionych/wiosennych Targów eHandlu zainteresowanych większą przestrzenią - **3 i więcej stoisk**

[Układ hali, ceny](https://targiehandlu.pl/top30_p3dd5ac1k)

**Prośba o info zwrotne jeśli taką przestrzenią zainteresowana jest Twoja firma**

@component('mail::panel')

# Wtorek - 23 kwietnia 11:00

**Ekskluzywna sprzedaż dla firm z TOP30** Konkursu dla Wystawców czyli dla Twojej firmy

@endcomponent

## Środa - 24 kwietnia 11:00

Sprzedaż otwarta dla pozostałych zainteresowanych

Pozdrowienia, 

{{$footer}}

@endcomponent

