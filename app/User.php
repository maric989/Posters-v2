<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function posters()
    {
        return $this->hasMany(Poster::class);
    }

    public function definitions()
    {
        return $this->hasMany(Definition::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getApprovedPosters()
    {
        return $this->posters()->where('approved',1)->get();
    }
    public function getPosterLikes()
    {
        $result = [
            'posters_like' => 0
        ];

        $posters = $this->posters()->get();

        foreach ($posters as $poster){
            $likes = Like::where('likeable_id',$poster->id)
                ->where('likeable_type','App\Poster')
                ->where('up',1)
                ->count();

            $result['posters_like'] += $likes;
        }

        return $result['posters_like'];
    }

    public function getDefinitionLikes()
    {
        $result = [
            'definition_like' => 0
        ];

        $definitions = $this->definitions()->get();

        foreach ($definitions as $definition){
            $likes = Like::where('likeable_id',$definition->id)
                ->where('likeable_type','App\Definition')
                ->where('up',1)
                ->count();

            $result['definition_like'] += $likes;
        }

        return $result['definition_like'];
    }

    public function getPostersCount()
    {
        $posters = $this->posters()->where('approved',1)->get();

        return count($posters);
    }

    public function getDefinitionCount()
    {
        $definitions = $this->definitions()->where('approved',1)->get();

        return count($definitions);
    }
}
