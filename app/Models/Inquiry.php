<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'vehical_id', 'type', 'name', 'email', 'phone', 'description', 'status'
    ];
    public function vehical(){
        return $this->belongsTo('App\Models\Vehical');
    }

}
