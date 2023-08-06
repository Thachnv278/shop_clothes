<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'categorys';
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }

    
}
