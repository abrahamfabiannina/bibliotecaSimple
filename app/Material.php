<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //

    protected $table = 'materials';

    protected $fillable = [
        'titulo', 'autor', 'descripcion','url','portada','tipo','fkUsuario',];
}
