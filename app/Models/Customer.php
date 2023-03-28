<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='customer';
    protected $fillable=[
        'employe_id',
        'customer_name',
        'address',
        'phone',
        'note',
        'status',
    ];
}
