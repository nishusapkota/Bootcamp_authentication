<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisterUserRequest;

class RegisterController extends Controller
{
 /**
  * @param RegisterUserRequest $request
  * @return JsonResponse
  */   
    public function __invoke(RegisterUserRequest $request):JsonResponse
    {
        $data=$request->validated();
       
        $user=User::create($data);
        
        event(new Registered($user));

        return response()->json([
            'message' => 'User registered successfully'
        ]);
    }
}
