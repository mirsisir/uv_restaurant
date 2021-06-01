<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
                  'name',
                  'details',
                  'status',
                  'is_special',
                  'image'
              ];
    protected $dates = [];
    protected $casts = [];

    public static function active(){
        return Category::where('status',1)->get();
    }



}
