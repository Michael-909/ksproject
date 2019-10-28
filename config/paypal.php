<?php 
return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AX2XLYG1bpp-Y90fTJibX6tIel59eE8cO2X44c740UdRAhtVzRmcNQzlAtw0LTNS4nWD8p9qNHnpvPkS'),
    'secret' => env('PAYPAL_SECRET','ED6vh1fHKZXAiYhjlxUw0yusj0-hW5zDRRH7NQFIwrLL0Uj2C9mHMtGQRGXnIcIhs0QnuUZV6nW5HyVt'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];