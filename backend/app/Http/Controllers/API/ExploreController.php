<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Foursquare;

class ExploreController extends Controller
{
    private $foursquare = null;

    public function __construct()
    {
        $this->foursquare = new Foursquare();
    }

    public function index()
    {
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_name)
    {
        return $this->foursquare->explore($category_name);
    }
}
