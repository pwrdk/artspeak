<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    protected $table = 'words';
    protected $fillable = ['type','word'];
    public $timestamps = false;

    public function scopeFromType($query, $type)
    {
        return $query->where('type', '=', $type)
            ->orderByRaw("RAND()")
            ->limit(1)
            ->get();
    }
}
