<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;

class ApiController extends Controller
{
    public function getFlowers()
    {
        $flowers = Flower::all();
        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function getXflowers($amount)
    {
        $flowers = Flower::limit($amount)->get();
        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function getFlower($id)
    {
        $flower = Flower::find($id);
        return $flower->toJson(JSON_PRETTY_PRINT);
    }

    public function getType($type)
    {
        $flowers = Flower::where('type', $type)->get();
        return $flowers->toJson(JSON_PRETTY_PRINT);
    }
}
