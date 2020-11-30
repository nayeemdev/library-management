<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(UserUpdateRequest $request)
    {
        User::where('id', auth()->user()->id)->update($request->requestData());

        return back()->with(['message'=> 'Profile Updated', 'type'=>'success']);
    }
}
