<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\AuthService;

class UserController extends Controller
{
    public function create(SignUpRequest $request) {
        AuthService::store($request);
        return redirect('/');
    }

    public function login(AuthRequest $request) {
        if(AuthService::auth($request)) {
            return redirect('/');
        }
        else {
            return back()->withErrors(['username' => 'Incorrect username/password']);
        }
    }
    public function destroy() {
        auth()->logout();
        return redirect('/');
    }

    public function add(CommentRequest $request) {
        $attributes = $request->validated();
        $attributes['user_id'] = auth()->user()->id;
        Comment::create($attributes);
        return back();
    }
}
