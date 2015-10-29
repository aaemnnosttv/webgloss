<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermAlias extends Model
{
    protected $fillable = [
        'name'
    ];

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
