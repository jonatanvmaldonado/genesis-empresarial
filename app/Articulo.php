<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titulo',
        'descripcion', 
        'fecha',
        'user_id'
    ];

    public $timestamps = false;

    public function comentarios()
    {
        return $this->hasMany('App\Comentario', 'articulo_id');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
