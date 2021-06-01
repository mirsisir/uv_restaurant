<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{



    protected $table = 'food';


    protected $primaryKey = 'id';

    protected $fillable = [
                  'name',
                  'category_id',
                  'details',
                  'price',
                  'is_offer',
                  'is_special',
                  'status',
                  'image'
              ];


    protected $dates = [];


    protected $casts = [];


    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }



}
