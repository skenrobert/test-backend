<?php

namespace App\Http\Controllers\Testbackend;

use Illuminate\Http\Request;
use App\Models\Tipoidentificacione;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class TipoidentificacioneController extends ApiController
{
    public function index()
    {
        $tipoidentificaciones = Tipoidentificacione::all();
        return $this->showall($tipoidentificaciones);
    }

    public function show(Tipoidentificacione $tipoidentificacione)
    {
        return $this->showOne($tipoidentificacione);
    }

}
