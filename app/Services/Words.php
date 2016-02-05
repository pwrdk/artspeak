<?php

namespace App\Services;

use App\Services\Nouns;
use App\Services\Verbs;

class Words implements WordsInterface
{
    public function fetch()
    {
        $words = (new Verbs)->fetch()->pluck('word');
        $col = $words->merge((new Nouns)->fetch()->pluck('word'));
        
        return $col->all();
    }
}
