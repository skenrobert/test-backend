<?php

namespace App\Http\Controllers\Testbackend;

use Illuminate\Http\Request;
use App\Models\TipoFacturacione;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class TipoFacturacioneController extends ApiController
{
    public function index()
    {
        $tipofacturaciones = TipoFacturacione::all();
        return $this->showall($tipofacturaciones);
    }

    public function show(TipoFacturacione $tipofacturacione)
    {
        return $this->showOne($tipofacturacione);
    }

}
