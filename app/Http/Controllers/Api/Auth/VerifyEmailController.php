<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * @param EmailVerificationRequest $request
     * @return RedirectResponse
     */

    public function __invoke(EmailVerificationRequest $request):RedirectResponse
    {
        $request->fulfill();

        return redirect()->intended(
            config('app.frontend_url') . RouteServiceProvider::LOGIN . '?verified=1'
        );
    }
}
