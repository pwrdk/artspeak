<?php
namespace App\Services;

use App\Words as WordsModel;

class Nouns implements WordsInterface
{
    public function fetch()
    {
        return WordsModel::fromType(2);
    }
}
