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

    public function store(Request $request)
    {
        $tipoidentificacione = Tipoidentificacione::create($request->all());
        return $this->showOne($tipoidentificacione, Response::HTTP_CREATED);
    }

    public function show(Tipoidentificacione $tipoidentificacione)
    {
        return $this->showOne($tipoidentificacione);
    }

    public function update(Request $request, Tipoidentificacione $tipoidentificacione)
    {
        $tipoidentificacione->fill($request->all());

        if($tipoidentificacione->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $tipoidentificacione->save();
        return $this->showOne($tipoidentificacione);
    }

    public function destroy(Tipoidentificacione $tipoidentificacione)
    {
        $tipoidentificacione->delete($tipoidentificacione);
        return $this->showOne($tipoidentificacione);
    }
}
