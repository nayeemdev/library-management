<?php

namespace App\Http\Controllers\Librarian;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', User::ROLE_USER)->paginate('15');
        return view('librarian.users.index', compact('users'));
    }

    public function changeStatus($status, $id)
    {
        User::where('id',$id)->update(['is_banned' => !$status]);

        return back()->with(['message'=> 'User Status Changed.', 'type'=>'success']);
    }
}
