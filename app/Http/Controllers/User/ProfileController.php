<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = User::findOrfail(Auth::id());

        $this->authorize('update', $user);

        return view('user.profile.edit', compact('user'));
    }


    public function update(UpdateUserRequest $request)
    {
        $user = User::findOrFail(Auth::id());

        $this->authorize('update', $user);

        $user->name = $request->get('name');
        $status = $user->save();

        return back()->with('status', $status);
    }

}
