<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;
    protected $table = 'mesas';
    protected $primaryKey = 'codigo';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['numero', 'capacidad', 'estado']; // Campos para asignación masiva
    
}
