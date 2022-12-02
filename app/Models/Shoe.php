<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    protected $fillable =[
        'nama', 'harga', 'size', 'stok'
    ];
}
