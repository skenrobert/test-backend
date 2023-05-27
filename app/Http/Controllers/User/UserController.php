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

    }

    public function store(UserRequest $request){
        
        $user = User::create($request->except('imagen'));

        if ($request->file('imagen')) {

            $file = $request->file('imagen');
            $name = 'user'.time().'.webp';
            $path = public_path('images/img_api/users/'.$name);

            $imgFile = Image::make($file->getRealPath())->encode('webp');

            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->fit(200, 200)->save($path);

            $user->imagen = $name;
        }

        $user->password  = bcrypt($request->password);

        $user->save();

        $real = User::find($user->id);
        $real->empresa;
        return $this->showOne($real, Response::HTTP_CREATED);

    }


   public function show(User $user){
        $user->persona;
        return $this->showOne($user);
    }

    public function update(UserRequest $request, User $user)
    {

        if($request->has('password')){
              $user->password = bcrypt($request->password);
        }

        if($request->has('email')){
            $user->email = $request->email;
        }
         
        if ($request->file('imagen')) {

            $file = $request->file('imagen');
            $name = 'user'.time().'.webp';
            $path = public_path('images/img_api/users/'.$name);

            $imgFile = Image::make($file->getRealPath())->encode('webp');

            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->fit(200, 200)->save($path);

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

    public function estatus(User $user) 
    {
        $user->estatus = $user->estatus ? false : true;
        $user->update();
        return $this->showOne($user);
    }
}
