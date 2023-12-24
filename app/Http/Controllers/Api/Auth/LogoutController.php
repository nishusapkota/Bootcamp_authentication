<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
 /**
  * @param Request $request
  * @return JsonResponse
  */   
    public function __invoke(Request $request):JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'user deleted successfully'
        ]);
    }
}
