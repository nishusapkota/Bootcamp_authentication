<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;

class EmailVerificationRequest extends FormRequest
{
   private User $user;

    public function authorize(): bool
    {
        $userId = $this->route("id");

        $user = User::find($userId);


        if (!$user || ! hash_equals(sha1($user->getEmailForVerification()), (string) $this->route('hash'))) {
            return false;
        }

        $this->user = $user;
        return true;
    }
    
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function fulfill(): void
    {
        if (! $this->user->hasVerifiedEmail()) {
            $this->user->markEmailAsVerified();

            event(new Verified($this->user));
        }
    }
}
