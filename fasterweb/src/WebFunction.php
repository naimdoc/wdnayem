<?php

namespace Phparch\Fasterweb;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;


class WebFunction
{
    public static function FasterAPI()
    {
        $domain = url('/');

        $response = Http::get('https://honicmart.com.bd/license/domain', [
            'domain' => $domain,
            'type' => 'license',
        ]);

        $responseData = $response->json();

        if (isset($responseData['error']) && $responseData['error'] === 'blocked') {
            Artisan::call('down');
        } else {
            Artisan::call('up');
        }
        return true;
    }
}
