<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    // use HasFactory, Sluggable, SoftDeletes;
    use HasFactory, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function vehical(){
        return $this->belongsTo('App\Models\Vehical');
    }

}
