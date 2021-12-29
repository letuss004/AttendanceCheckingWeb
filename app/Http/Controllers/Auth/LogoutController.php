<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class LogoutController
{
    public function logout(): array
    {
        $user = User::findOrFail(auth()->user()->getAuthIdentifier());
        $user->tokens()->delete();
        return [
            'message' => 'success'
        ];
    }
}
