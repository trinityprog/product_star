<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getData($lat, $lon, $lang = 'ru_RU')
    {
        $client = Http::withHeaders([
            'X-Yandex-API-Key' => '30b64283-298b-40b5-a3c7-8c0336689f67'
        ])
            ->get('https://api.weather.yandex.ru/v2/informers', [
                'lat' => $lat,
                'lon' => $lon,
                'lang' => $lang
            ]);

        if($client->successful()) return $client->json();

        throw new \ErrorException('500: Server Error');
    }
}
