<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tema';
    protected $fillable = ['titulo','area','palabras_clave','estado','descripcion','pdf_file'];
}
