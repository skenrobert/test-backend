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

    public function store(Request $request)
    {
        $tipofacturacione = TipoFacturacione::create($request->all());
        return $this->showOne($tipofacturacione, Response::HTTP_CREATED);
    }

    public function show(TipoFacturacione $tipofacturacione)
    {
        return $this->showOne($tipofacturacione);
    }

    public function update(Request $request, TipoFacturacione $tipofacturacione)
    {
        $tipofacturacione->fill($request->all());

        if($tipofacturacione->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $tipofacturacione->save();
        return $this->showOne($tipofacturacione);
    }

    public function destroy(TipoFacturacione $tipofacturacione)
    {
        $tipofacturacione->delete($tipofacturacione);
        return $this->showOne($tipofacturacione);
    }
}
