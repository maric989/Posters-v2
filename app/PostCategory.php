<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_categories';

    protected $fillable = [
        'post_id',
        'category_id'
    ];

    public function poster()
    {
        return $this->belongsTo(Poster::class,'post_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function storeCategory($posterID, $categoryID)
    {
        $this->post_id = $posterID;
        $this->category_id = $categoryID;

        $this->save();
    }
}
