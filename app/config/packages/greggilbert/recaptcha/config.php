<?php

return array(

    /*
        |--------------------------------------------------------------------------
        | API Keys
        |--------------------------------------------------------------------------
        |
        | Set the public and private API keys as provided by reCAPTCHA.
        |
        | In version 2 of reCAPTCHA, public_key is the Site key,
        | and private_key is the Secret key.
        |
        */
    'public_key'  => '6LfJHxETAAAAAD7dt-0eAb5X8hv8NQhxGkQB9z-A',
    'private_key' => '6LfJHxETAAAAAMJ1zFuSRXsxbf4Au_sBXTLZGDEi',

    /*
        |--------------------------------------------------------------------------
        | Template
        |--------------------------------------------------------------------------
        |
        | Set a template to use if you don't want to use the standard one.
        |
        */
    'template'    => '',

    /*
        |--------------------------------------------------------------------------
        | Driver
        |--------------------------------------------------------------------------
        |
        | Determine how to call out to get response; values are 'curl' or 'native'.
        | Only applies to v2.
        |
        */
    'driver'      => 'curl',

    /*
        |--------------------------------------------------------------------------
        | Options
        |--------------------------------------------------------------------------
        |
        | Various options for the driver
        |
        */
    'options'     => array(

        'curl_timeout' => 1,

    ),

    /*
        |--------------------------------------------------------------------------
        | Version
        |--------------------------------------------------------------------------
        |
        | Set which version of ReCaptcha to use.
        |
        */
    'version'     => 2,

);
