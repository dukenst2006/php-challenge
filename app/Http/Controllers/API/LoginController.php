<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * @OA\Post(
     ** path="/api/auth/login",
     *   tags={"Users"},
     *   summary="Login a user",
     *   operationId="login",
     *
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function login(Request $request)
    {
        // $this->validate($request, $this->rules(), $this->validationErrorMessages());

        // $request = Request::create('/oauth/token', 'POST', [
        //     'grant_type' => 'password',
        //     'client_id' => config('services.vue_client.id'),
        //     'client_secret' => config('services.vue_client.secret'),
        //     'username' => $request->email,
        //     'password' => $request->password,
        // ]);

        // return app()->handle($request);
        $validator = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($validator)) {
            return response()->json(['error' => 'Unauthorised, incorect credential'], 401);
        } else {
            $success['access_token'] = auth()->user()->createToken('authToken')->accessToken;
            $success['user'] = auth()->user();
            //return response()->json(['success' => $success], 200);
            return response([$success], 200);
        }
    }

    /**
     * @OA\Get(
     ** path="/api/user/logout",
     *   tags={"Users"},
     * security={
     *  {"passport": {}},
     * },
     *   summary="Logout a user.",
     *   operationId="logout-user",
     *
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    public function logout()
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
        Auth::user()->token()->revoke();
        return response()->json(['success' => true, 'message' => 'User Logged Out'], 200);
    }

    /**
     * Get the login validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Get the login validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }
}
