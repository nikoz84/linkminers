<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    const CREATED_AT = 'release_date';

    protected $fillable  = ['name', 'manufacturer'];

    public function setReleaseDateAttribute($value) { 
        $this->attributes['release_date'] = \Carbon\Carbon::now(); 
    }
}
