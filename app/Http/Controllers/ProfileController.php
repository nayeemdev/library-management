<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'password' => 'confirmed'
        ]);

        $requestData = [
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        if ($request->has('password')) {
            $requestData['password'] = Hash::make($request->password);
        }

        User::where('id',auth()->user()->id)->update($requestData);

        return back()->with(['message'=> 'Profile Updated', 'type'=>'success']);
    }
}
