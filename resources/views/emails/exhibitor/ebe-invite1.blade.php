

@component('mail::message')



<div style="text-align: center;">
	<a href="{{$promolink}}" target="_blank">
		<img src='{{$imageEnc}}' alt="" style="margin-top: 10px; margin-bottom: 30px; max-height: 250px;" />
	</a>
</div>

## Hallo,

Wir freuen uns, Dir mitteilen zu können, dass wir als **Aussteller auf der E-Commerce Berlin Expo 2025** auch mit dabei sind und wollen Dich einladen, uns am **19. und 20. Februar in der STATION Berlin**, Luckenwalder Str. 4-6 persönlich zu besuchen.

Sichere dir jetzt dein **kostenloses Ticket** und komm an unserem Stand vorbei, um sich mit uns zu unterhalten:

@component('mail::button', ['url' => $promolink])
	Klick hier, um dich für ein kostenloses Ticket zu registrieren
@endcomponent

Warum ein Besuch bei uns lohnt?

Auf der E-Commerce Berlin Expo treffen sich alle wichtigen Entscheidungsträger aus den Bereichen E-Commerce, Marketing und Innovation zu einem einmaligen Networking-Erlebnis.

**Über 290 Unternehmen** stellen aus und mehr als **150 führende Experten** von Branchenriesen wie **TikTok, Zalando, Fielmann, H&M, OTTO, Philips, und IKEA** präsentieren innovative und zukunftsweisende Entwicklungen und Trends, die dir helfen werden, neue Möglichkeiten für das Wachstum deines Onlinegeschäfts zu finden.

Die E-Commerce Berlin Expo bietet die Chance, mit Gleichgesinnten in Kontakt zu treten, die nach Erfolg streben, langfristige Partnerschaften zu schließen und das eigene Wissen und Können zu erweitern, um der Konkurrenz einen Schritt voraus zu sein.

@component('mail::button', ['url' => $promolink])
	Klick hier, um dich für ein kostenloses Ticket zu registrieren
@endcomponent

Wir freuen uns auf die Begegnung mit Dir!

@endcomponent


