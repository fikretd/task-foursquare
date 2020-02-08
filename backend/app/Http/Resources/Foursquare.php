<?php

namespace App\Http\Resources;

use GuzzleHttp\GuzzleHttp;

class Foursquare
{
    private $client;
    private $query;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => env('FOURSQUARE_API_URL')
        ]);
        $this->query = [
            'client_id' => env('FOURSQUARE_API_CLIENT_ID'),
            'client_secret' => env('FOURSQUARE_API_CLIENT_SECRET'),
            'v' => date('Ymd')
        ];
    }

    public function categories()
    {
        try
        {
            $r = $this->client->request('GET', '/v2/venues/categories', [
                'query' => $this->query,
                'verify' => false
            ]);

            return $r->getBody();
        }
        catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function explore($category_name)
    {
        $this->query['near'] = 'valletta';
        $this->query['query'] = $category_name;

        try
        {
            $r = $this->client->request('GET', '/v2/venues/explore', [
                'query' => $this->query,
                'verify' => false
            ]);
            
            return $r->getBody();
        }
        catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }
}
