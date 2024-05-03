<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth (AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provider credentials are incorrect']
            ]);
        }

        /**
         * Caso seja interessante, podemos deslogar o usuário de qualquer
         *  outro dispositivo antes de logar novamente.
         * No caso vamos fazer isso por padrão, independente do usuário 'solicitar',
         *  por isso o if comentado abaixo
         */

        // if ($request->has('logout_other_devices')) {
            $user->tokens()->delete();
        // }


        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }

    public function logout (Request $request )
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'success',
        ]);
    }

    public function me (Request $request )
    {
        $user = $request->user();

        return response()->json([
            'me' => $user,
        ]);
    }
}
