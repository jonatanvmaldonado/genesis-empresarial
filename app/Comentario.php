<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcion', 
        'fecha',
        'articulo_id', 
        'user_id'
    ];

    public $timestamps = false;

    public function articulo()
    {
        return $this->belongsTo('App\Articulo', 'articulo_id');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
