<?php

namespace App\Http\Controllers;

use App\Services\Words;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function words()
    {
        $words = (new Words)->fetch();
        return json_encode(['success' => 'success', 'data' => $words]);
    }
}
