

@component('mail::message')

<div style="text-align: center;">
	<a href="{{$promolink}}">
		<img src="{{$imageEnc}}" alt="" style="margin-top: 10px; margin-bottom: 30px;">
	</a>
</div>

# Hi,

## We would like to let you know that {{  array_get($companydata, "name") }} is exhibiting at the E-Commerce Warsaw Expo 2025 on **April 3rd** at EXPO XXI (Prądzyńskiego 12/14 str.). 

We’re excited for a day fully dedicated to e-commerce best practices & trends. 

Come have a chat with us at our stand.

@component('mail::button', ['url' => $promolink])
	Register for a free ticket here
@endcomponent

Let us also mention that there will be 4 stages full of speakers and over 130 other service providers at their booths. 

The event is a must-attend! 

Looking forward to meet you! 

Kind Regards,


@endcomponent



