<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Brand extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='brands';
    protected $fillable=[
        'id',
        'name',
        'logo',
        'description',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
