<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\ApiController;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\ImageManagerStatic as Image;

//use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    public function index()
    {
        $usuarios = User::all();
        return $this->showAll($usuarios);

        // $usuarios = User::paginate(5);
        // $custom = collect(['my_data' => 'My custom data here']);
        // $data = $custom->merge($usuarios);
        // return response()->json($data,200);

    }

    public function store(UserRequest $request){
        
        $user = User::create($request->except('imagen'));

        if ($request->file('imagen')) {

            $file = $request->file('imagen');
            $name = 'user'.time().'.webp';
            $path = public_path('images/img_api/users/'.$name);
            // $path = public_path() . '\images\img_api\users\'.$name;
            // $file->move($path, $name);

            $imgFile = Image::make($file->getRealPath())->encode('webp');

            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->fit(200, 200)->save($path);

            // return $imgFile->response();
            $user->imagen = $name;
        }

        $user->password  = bcrypt($request->password);

        $user->save();

        $real = User::find($user->id);
        $real->empresa;
        return $this->showOne($real, Response::HTTP_CREATED);

    }


   public function show(User $user){
        $user->tercero;
        $user->empresa->decimale;
        $user->perfile;
        return $this->showOne($user);
    }

    public function update(UserRequest $request, User $user)
    {
        // if($user->isDirty()){
        //     return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar',
        //      'code' => 422], 422);
        // }

            // return response()->json('email:'.$request->has('email'));//TODO: formData 
            // return response()->json('email:'.$request->email);


        if($request->has('password')){
              $user->password = bcrypt($request->password);
        }

        if($request->has('email')){
            $user->email = $request->email;
        }
         
        if($request->has('perfile_id')){
            $user->perfile_id = $request->perfile_id;
        }

        if($request->has('tercero_id')){
            $user->tercero_id = $request->tercero_id;
        }

        if ($request->file('imagen')) {
            // $imagen_path = public_path().'/images/img_api/users/'.$user->imagen;
            //$imagen_path = public_path().'\images\img_api\users\''.$user->imagen;
            //unlink($imagen_path); //TODO: elimina la foto vieja pero debe ser provado en el servidor ya que arregla las carpetas segun el sistema operativo buscar alternativa

            $file = $request->file('imagen');
            $name = 'user'.time().'.webp';
            $path = public_path('images/img_api/users/'.$name);
            // $path = public_path() . '\images\img_api\users\'.$name;
            // $file->move($path, $name);

            $imgFile = Image::make($file->getRealPath())->encode('webp');

            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->fit(200, 200)->save($path);

            // return $imgFile->response();
            $user->imagen = $name;
            }

        $user->save();

        $user->tercero;
        $user->perfile;
        return $this->showOne($user);
    }

    public function destroy(User $user)
    {
        $user->delete($user);
        $user->tercero;
        return $this->showOne($user);
    }

    public function estatus(User $user) //TODO: NO DEJAR LOGEAR SI ESTA EN FALSE
    {
        $user->estatus = $user->estatus ? false : true;
        $user->update();
        $user->tercero;
        return $this->showOne($user);
    }
}
