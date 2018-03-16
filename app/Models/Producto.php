<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    protected $fillable = ['sku','descripcion','pais_origen','fabricante','categoria_id'];

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria','categoria_id');
    }

    public function documentos(){
        return $this->hasMany('App\Models\DocumentoProducto','producto_id');
    }
}
