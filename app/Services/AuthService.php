<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use \Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function store(SignUpRequest $request) {
        $attributes = $request->validated();
        auth()->login(User::create($attributes));
    }

    public static function auth(AuthRequest $request) {
        $attributes = $request->validated();
        return auth()->attempt($attributes);
    }
}
