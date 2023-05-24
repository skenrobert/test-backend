<?php

namespace App\Http\Controllers\Testbackend;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class PersonaController extends ApiController
{
    public function index()
    {
        $personas = Persona::all();
        return $this->showall($personas);
    }

    public function store(Request $request)
    {
        $persona = Persona::create($request->all());
        return $this->showOne($persona, Response::HTTP_CREATED);
    }

    public function show(Persona $persona)
    {
        return $this->showOne($persona);
    }

    public function update(Request $request, Persona $persona)
    {
        $persona->fill($request->all());

        if($persona->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $persona->save();
        return $this->showOne($persona);
    }

    public function destroy(Persona $persona)
    {
        $persona->delete($persona);
        return $this->showOne($persona);
    }
}
