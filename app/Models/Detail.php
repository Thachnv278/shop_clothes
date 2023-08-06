<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete


class Detail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'details';
    protected $fillable = [
        'id',
        'color',
        'size',
        'quantity',
        'product_id'
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
