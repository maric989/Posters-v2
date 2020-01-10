<?php

namespace App\Models\User;

use App\Definition;
use App\Like;
use App\Models\Comment\Comment;
use App\Models\Poster\Poster;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

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

    public function isPostLiked($post_id,$user_id)
    {
        return Like::where('user_id',$user_id)->where('likeable_id',$post_id)->where('likeable_type','App\Models\Poster\Poster')->count();
    }

    public function sortedAuthors()
    {

        $autors = User::where('role_id',2)->take(10)->get();
        $likes = [];
        foreach ($autors as $autor) {
            $likes[$autor->id] = $this->countLikesDiff();
        }
        arsort($likes);

        $user_ids = array_keys($likes);

        $sorted_autors = User::whereIn('id',$user_ids)
            ->orderBy(DB::raw("FIELD(id,".join(',',$user_ids).")"))
            ->get();


        return $sorted_autors;
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    public function getTopAuthor()
    {
        try {
            $autors = User::where('role_id',2)->get();

            $likes = [];
            foreach ($autors as $author) {
                $likes[$author->id] = $this->countLikesDiff();
            }
            arsort($likes);

            $user_ids = array_keys($likes);

            $topAuthor =  User::whereIn('id',$user_ids)
                ->orderBy(DB::raw("FIELD(id,".join(',',$user_ids).")"))
                ->limit(1)
                ->first();

            return $topAuthor;

        }catch (\Exception $e){
            throw new \Exception('Run seeders');
        }

    }

    public function countLikesDiff()
    {
        $posterUp =   Poster::getUserPosterLikes($this->id);
        $posterDown = Poster::getUserPosterDislikes($this->id);
//        $definitionUp = Definition::getUserDefinitionLikes($this->id);
//        $definitionDown = Definition::getUserDefinitionDislikes($this->id);
        $definitionUp = 0;
        $definitionDown = 0;
        $ups = $posterUp + $definitionUp;
        $downs = $posterDown + $definitionDown;
        $sum = $ups - $downs;

        return $sum;
    }

    public function getJoinedAtAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function getProfilePhotoLinkAttribute()
    {
        $default_image = config('settings.default_profile_image');
        if (isset($this->profile_photo) && !empty($this->profile_photo)){
            return $this->profile_photo;
        }
        return $default_image;
    }
}
