<?php


namespace Hillel\Geo;


use Illuminate\Support\Facades\Http;

class IpApiGeoService implements GeoService
{
    protected $data;

    public function continentCode()
    {
        return $this->data['continentCode'];
    }

    public function countryCode()
    {
        return $this->data['countryCode'];
    }

    public function parse($ip)
    {
        $response = Http::get(env('IP_API') . $ip . '?fields=continentCode,countryCode');
        $this->data = $response->json();
    }
}
