<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register()
    {
        $validator = Validator::make(request()->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $user = User::create([
            'name'=> request()->name,
            'email'=> request()->email,
            'password'=> bcrypt(request()->password)
        ]);
        if ($user) {
            return response()->json(['message' => 'Registered successfully']);
        } else {
            return response()->json(['message' => 'Registration failed']);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function update(Request $request, string $id)
    {
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        'no_hp' => 'nullable|string', 
        'role' => 'nullable|string',
        'gender' => 'nullable|integer',
        'province' => 'nullable|string',
        'city' => 'nullable|string',
        'birthdate' => 'nullable|date',
        'profile_image' => 'nullable|string',
        'banner_image' => 'nullable|string',
        'education' => 'nullable|string',
        'about_me' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 422);
    }

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->no_hp = $request->input('no_hp');
    $user->role = $request->input('role');
    $user->gender = $request->input('gender');
    $user->province = $request->input('province');
    $user->city = $request->input('city');
    $user->birthdate = $request->input('birthdate');
    $user->profile_image = $request->input('profile_image');
    $user->banner_image = $request->input('banner_image');
    $user->education = $request->input('education');
    $user->about_me = $request->input('about_me');

    $isUpdated = $user->save();

    if ($isUpdated) {
        return response()->json(['message' => 'User updated successfully', 'data' => $user], 200);
    } else {
        return response()->json(['message' => 'Failed to update user'], 500);
    }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
