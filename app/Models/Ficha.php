<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'contenido', 'profesor_id', 'estudiante_id'];

    public function profesor()
    {
        return $this->belongsTo(User::class, 'profesor_id');
    }

    public function estudiante()
    {
        return $this->belongsTo(User::class, 'estudiante_id');
    }
}
