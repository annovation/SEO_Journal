<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id','author_id','deleted_at','created_at','updated_at'];


    /**
     * Save a new post
     *
     * @param array $data
     * @return Post
     */

    public function savePost($data)
    {
        return $this->create($data);
    }

    /**
     * Update post
     *
     * @param array $data
     * @return void
     */

    public function updatePost($data)
    {
        $this->update($data);
    }

    /**
     * Delete post
     * provjera je li trashed - znači ako ima flag u bazi, tj. popunjenu kolonu deletedAt, ako ne onda se soft deletea
     *
     * @return void
     */

     public function deletePost($data)
     {
        if($this->trashed())
        {
            $this->forceDelete();
            return;
        }
        else {
            $this->delete();
        }
     }
}
