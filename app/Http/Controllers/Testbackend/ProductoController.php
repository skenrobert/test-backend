<?php

namespace App\Http\Controllers\Testbackend;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;

class ProductoController extends ApiController
{
    public function index()
    {
        $productos = Producto::all();
        return $this->showall($productos);
    }

    public function store(Request $request)
    {
        $producto = Producto::create($request->all());
        return $this->showOne($producto, Response::HTTP_CREATED);
    }

    public function show(Producto $producto)
    {
        return $this->showOne($producto);
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->fill($request->all());

        if($producto->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $producto->save();
        return $this->showOne($producto);
    }

    public function destroy(Producto $producto)
    {
        $producto->delete($producto);
        return $this->showOne($producto);
    }
}
