<?php

namespace App\Http\Controllers\Testbackend;

use App\Models\Factulinea;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class FactulineaController extends ApiController
{
    public function index()
    {
        $factulineas = Factulinea::all();
        return $this->showall($factulineas);
    }

    public function store(Request $request)
    {
        $factulinea = Factulinea::create($request->all());
        return $this->showOne($factulinea, Response::HTTP_CREATED);
    }

    public function show(Factulinea $factulinea)
    {
        return $this->showOne($factulinea);
    }

    public function update(Request $request, Factulinea $factulinea)
    {
        $factulinea->fill($request->all());

        if($factulinea->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $factulinea->save();
        return $this->showOne($factulinea);
    }

    public function destroy(Factulinea $factulinea)
    {
        $factulinea->delete($factulinea);
        return $this->showOne($factulinea);
    }
}
