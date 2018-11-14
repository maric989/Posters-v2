<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function poster()
    {
        return $this->belongsTo(Poster::class);
    }

    public function definition()
    {
        return $this->belongsTo(Definition::class);
    }
}
