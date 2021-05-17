<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * @group Authorization
     *
     * Authorize user
     * @unauthenticated
     *
     * @bodyParam email string required User email
     * @bodyParam password string required User password
     *
     * @response 200 {
     *  "data": {
     *      "token": "994|qvyGk0Wwtah8KgY8j4R8IzR2uZfXIc3ssB2re7f3",
     *      "token_type": "bearer"
     *  }
     * }
     *
     * @param Request $request
     * @return JsonResource
     */
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Неверный пароль'],
            ]);
        }

        $tokenName = "{$request->header('user-agent')} ({$request->ip()})";

        $token = $user->createToken($tokenName);

        return new JsonResource([
            'token' => $token->plainTextToken,
            'token_type' => 'bearer',
        ]);
    }
}
