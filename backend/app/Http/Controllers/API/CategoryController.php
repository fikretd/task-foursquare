<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Foursquare;

class CategoryController extends Controller
{
    private $foursquare = null;

    public function __construct()
    {
        $this->foursquare = new Foursquare();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->foursquare->categories();
    }
}
