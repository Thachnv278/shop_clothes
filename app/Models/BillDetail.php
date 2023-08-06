<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'bill_details';
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'total',
        'size',
        'color',
        'bill_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class);  
    }
    public function bill(){
        return $this->belongsTo(Bill::class);
    }
}
