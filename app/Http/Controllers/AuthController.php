<?php

namespace App\Http\Controllers;

use App\Models\User;
// use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{

    public function register(Request $request){

        $validatedData = $request->validate([
            // 'email' => 'required|string|max:80',
            // 'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'creador_id' => 1,
            // 'email' => $validatedData['email'],
            // 'password' => Hash::make($validatedData['password'])
            ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request){
        if (!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'message' => 'Credenciales de acceso no válidas'
            // ], 401);
            ]);

        }

        $user = User::where('email', $request['email'])->firstOrFail();

        if(!$user->estatus){
            return response()->json([
                'message' => 'Usuario deshabilitado comuniquese con soporte'
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function dataUser(Request $request){
        $usuario = User::findOrFail($request->user()->id);
        return $usuario;
    }

    public function logout(Request $request){

        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'message' => 'estas exitosamente deslogeado y el token a sido borrado'
        ]);
    }


   

    
}
