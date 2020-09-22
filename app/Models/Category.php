<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable. - ne mogu se od strane usera poslati u bazi kroz formu
     *
     * @var array
     */
    protected $guarded = ['id','deleted_at','created_at','updated_at'];

    /**
     * Save a new category
     *
     * @param array $data
     * @return Office
     */

    public function saveCategory($data)
    {
        return $this->create($data);
    }

    /**
     * Update category
     *
     * @param array $data
     * @return void
     */

    public function updateCategory($data)
    {
        $this->update($data);
    }

    /**
     * Delete category
     *provjera je li trashed - znači ako ima flag u bazi, tj. popunjenu kolonu deletedAt, ako ne onda se soft deletea
     *
     * @return void
     */

    public function deleteCategory()
    {
        if($this->trashed()){
            $this->forceDelete();
            return;
        }

        $this->delete();
    }

    /**
     * Relacija
     *
     * @return void
     */
    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
