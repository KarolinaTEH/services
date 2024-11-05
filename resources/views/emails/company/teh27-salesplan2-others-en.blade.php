@component('mail::message')
 
# Hi {{ array_get($profile, "fname")  }},


Your company's photo collection from recent Ecommerce Warsaw Expo is waiting to be downloaded

@component('mail::button', ['url' => $photosUrl ])
Download as .zip
@endcomponent


Next Ecommerce Warsaw Expo will be held in spring - on 3rd of April - at EXPO XXI Warsaw.

@component('mail::panel')

Sales of exhibition spaces starts on 

## Thursday 11:00 am CET

[Hall plan, prices](https://ecommercewarsaw.com/exhibit)

@endcomponent


## Interested in 3 or more booths? 

If you need 3 or more booths, please contact us before Tuesday 


Regards, 

{{$footer}}

@endcomponent

