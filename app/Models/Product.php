<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'price',
        'image',
        'price',
        'price_sale',
        'date',
        'description',
        'category_id',
        'brand_id',   
    ];
    protected $table='products';
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function detail(){
        return $this->hasMany(Detail::class);
    }
    public function BillDetail(){
        return $this->hasMany(BillDetail::class);
    }


}
