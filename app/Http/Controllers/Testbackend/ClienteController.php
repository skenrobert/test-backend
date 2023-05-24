<?php

namespace App\Http\Controllers\Testbackend;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClienteRequest;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;
class ClienteController extends ApiController
{
    public function index()
    {
        $clientes = Cliente::all();
        return $this->showall($clientes);
    }

    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());
        return $this->showOne($cliente, Response::HTTP_CREATED);
    }

    public function show(Cliente $cliente)
    {
        $cliente->persona;
        return $this->showOne($cliente);
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $cliente->fill($request->all());

        if($cliente->isClean()){
            return $this->errorResponse('Debe Especificar al menos un valor diferente para actualizar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $cliente->save();
        return $this->showOne($cliente);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete($cliente);
        return $this->showOne($cliente);
    }

    // public function obtenerCliente(Request $request, Empresa $empresa){

    //     $cliente = DB::table('clientes')->select('id')->where(['empresa_id' => $empresa->id, 'persona_id' => $request->persona_id])->get();
    //     $data = Cliente::where('id', $cliente[0]->id)->firstOrFail();
    //     return $this->showOne($data);

    // }

    // public function allclientes(Empresa $empresa){
    //     $clientes = Cliente::where('empresa_id', $empresa->id)->with('persona')->orderBy('id','DESC')->get();
    //     return $this->showAll($clientes);
    // }
}
