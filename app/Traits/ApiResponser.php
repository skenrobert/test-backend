<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator as PaginationLengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\Response;

// use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

use Illuminate\Container\Container;
use Illuminate\Pagination\Paginator;

trait ApiResponser
{
    private function successResponse($data, $codigo)
    {
        return response()->json($data, $codigo);
    }

    protected function errorResponse($mesaje, $codigo){
        return response()->json( ['error'=>['status'=> 'error','message'=> $mesaje, 'code'=> $codigo]], $codigo);

    }
    
    protected function showAll(Collection $collection, $codigo = Response::HTTP_OK){
        return $this->successResponse(['data' =>$collection], $codigo);
    }

    protected function showOne(Model $instance, $codigo = Response::HTTP_OK){
        return $this->successResponse(['data' => $instance], $codigo);
    }  

    protected function showMessage($mesaje, $codigo = Response::HTTP_OK){
        return $this->successResponse(['data' => $mesaje], $codigo);
    }

}