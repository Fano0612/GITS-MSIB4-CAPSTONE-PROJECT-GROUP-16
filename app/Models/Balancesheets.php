<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balancesheets extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 
    protected $fillable = ['transaction_id','user_id', 'transaction_type','transaction_name', 'product_price'];
}
