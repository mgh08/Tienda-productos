<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('example');
    }

    public function index()
    {
        return response()->json("Hello World!", 200);
    }

    public function noAccess()
    {
        return response()->json("Hello no tienes access!", 200);
    }
}
