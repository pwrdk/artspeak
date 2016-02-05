<?php
namespace App\Services;

use App\Words as WordsModel;

class Verbs implements WordsInterface
{
    public function fetch()
    {
        return WordsModel::fromType(1);
    }
}
