<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Bill extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'date',
        'total',
        'payment',
        'status',
        'user_id',
    ];
    protected $table='bills';
    public function BillDetail(){
        return $this->hasMany(BillDetail::class);
    }
}
