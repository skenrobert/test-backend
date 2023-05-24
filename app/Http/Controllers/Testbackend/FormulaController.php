<?php

namespace App\Http\Controllers\Testbackend;

use App\Models\Formula;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class FormulaController extends ApiController
{
    public function index()
    {
        $formulas = Formula::all();
        return $this->showall($formulas);
    }

    public function store(Request $request)
    {
        $formula = Formula::create($request->all());
        return $this->showOne($formula, Response::HTTP_CREATED);
    }

    public function show(Formula $formula)
    {
        return $this->showOne($formula);
    }

    public function update(Request $request, Formula $formula)
    {
        $formula->fill($request->all());

        if($formula->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $formula->save();
        return $this->showOne($formula);
    }

    public function destroy(Formula $formula)
    {
        $formula->delete($formula);
        return $this->showOne($formula);
    }
}
