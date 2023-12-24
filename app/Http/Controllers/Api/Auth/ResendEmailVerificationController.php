<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class ResendEmailVerificationController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function __invoke(Request $request): JsonResponse|RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail())
         {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'Verification Link Sent']);
    }
}
