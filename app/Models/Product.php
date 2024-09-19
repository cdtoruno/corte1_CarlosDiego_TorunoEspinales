<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    protected $primaryKey = 'codigo';  
    protected $keyType = 'string';
    public $incrementing = false;
    use HasFactory;
    
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'categoria',
        'precio',
        'stock',
    ];
}
