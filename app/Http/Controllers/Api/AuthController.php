<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponse;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request)
    {
        \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $token = $user->createToken('MyNewApp')->plainTextToken;
                $user->accessToken = $token;
                return $user;
            }

        } catch (\Exception $e) {
            return $this->ApiResponse($e->getMessage(), 'user', null, [], false, 401);

        }

        return $this->ApiResponse('يوجد خطأ في الايميل او كلمة المرور', 'user', null, [], false, 401);
    }


    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->messages();
//            return $errors;
            return $this->ApiResponse($validator->errors()->messages(), 'user', [], [], $errors, false, 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            return $this->ApiResponse('تم تسجيل المستخدم بنجاح', 'user', UserResource::make($user), []);
        }


    }


    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user->tokens()->delete()) {
            return $this->ApiResponse('تم تسجيل الخروج بنجاح', 'key', [], []);
        }
        return $this->ApiResponse('يوجد خطأ ما', 'key', [], [], false, 500);

    }
}
