<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        $user = User::create($data);
        Mail::to($user->email)->send(new WelcomeMail($user));

        return $user;
    }

    // public function findByEmail(string $email)
    // {
    //     return User::where('email', $email)->first();
    // }
}
