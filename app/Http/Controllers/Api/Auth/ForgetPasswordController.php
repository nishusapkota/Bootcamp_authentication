<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Auth\ForgetPasswordRequest;

class ForgetPasswordController extends Controller
{
    /**
     * @param ForgetPasswordRequest $request
     * @throws ValidationException
     * @return JsonResponse
     */
    public function __invoke(ForgetPasswordRequest $request):JsonResponse
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            throw ValidationException::withMessages([
                'email' => [__($status)],
            ]);
        }

        return response()->json(['status' => __($status)]);

    }
}
