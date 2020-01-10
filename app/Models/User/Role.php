<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasMany(User::class,'role_id','id');
    }
}
