<?php
namespace App\Service;

// curl "https://api-adresse.data.gouv.fr/search/?q=8+bd+du+port"

use App\Entity\Store;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Geoloc {

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCoordinates($store,$limit = 1)
    {
        
        $response = $this->client->request("GET","https://api-adresse.data.gouv.fr/search/", [
            "query" => [
                "q" => $store["road_number"] . " " . $store['address'] . " " . $store['postal_code'] . " " . $store['city'],
                "limit" => $limit
            ]
        ]);
        $content = $response->getContent();
        $coordinate = json_decode($content);
        $result = $coordinate->features[0];
        $data['lat'] = $result->geometry->coordinates[1];
        $data['long']= $result->geometry->coordinates[0];
        $data['city']= $result->properties->city;
        $data['street']= $result->properties->street;
        return ($data);
    }
}
