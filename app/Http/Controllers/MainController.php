<?php

namespace App\Http\Controllers;

use App\Services\Words;
use App\Words as WordsModel;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function words()
    {
        if (\Request::input('all')) {
            $words = WordsModel::all();
        } else {
            $words = (new Words)->fetch();
        }

        return json_encode(['success' => 'success', 'data' => $words]);
    }

    public function all()
    {
        $words = WordsModel::all();
        return json_encode(['success' => 'success', 'data' => $words]);
    }

    public function input()
    {
        return view('input');
    }

    public function remove()
    {
        $id = \Request::input('id');
        WordsModel::find($id)->delete();
        return json_encode(['success' => 'success']);
    }
    
    public function add()
    {
        $word = WordsModel::create(\Request::all());
        return json_encode(['success' => 'success', 'data' => $word]);
    }
}
