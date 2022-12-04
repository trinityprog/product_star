<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;

class WeatherController extends Controller
{
    public function __invoke(WeatherService $weatherService)
    {
        $data = $weatherService->getData(68.970663,33.074909);
//        $data = json_decode('{"now":1670122988,"now_dt":"2022-12-04T03:03:08.778683Z","info":{"url":"https://yandex.ru/pogoda/23?lat=68.970663\u0026lon=33.074909","lat":68.970663,"lon":33.074909},"fact":{"obs_time":1670122800,"temp":-8,"feels_like":-12,"icon":"ovc","condition":"overcast","wind_speed":1.9,"wind_dir":"s","pressure_mm":773,"pressure_pa":1030,"humidity":88,"daytime":"n","polar":false,"season":"winter","wind_gust":4.2},"forecast":{"date":"2022-12-04","date_ts":1670101200,"week":48,"polar":"n","moon_code":14,"moon_text":"moon-code-14","parts":[{"part_name":"day","temp_min":-8,"temp_avg":-8,"temp_max":-8,"wind_speed":2.7,"wind_gust":5.7,"wind_dir":"s","pressure_mm":773,"pressure_pa":1030,"humidity":87,"prec_mm":0.2,"prec_prob":20,"prec_period":360,"icon":"ovc_-sn","condition":"light-snow","feels_like":-13,"daytime":"n","polar":false},{"part_name":"evening","temp_min":-9,"temp_avg":-9,"temp_max":-8,"wind_speed":2.2,"wind_gust":4.9,"wind_dir":"s","pressure_mm":771,"pressure_pa":1027,"humidity":87,"prec_mm":0,"prec_prob":0,"prec_period":240,"icon":"ovc","condition":"overcast","feels_like":-14,"daytime":"n","polar":false}]}}');
//        Мурманск Координаты: 68.970663, 33.074909

        return inertia('Weather', compact('data'));
    }
}
