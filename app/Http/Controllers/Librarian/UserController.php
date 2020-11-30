<?php

namespace App\Http\Controllers\Librarian;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ChangeStatus;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', User::ROLE_USER)->paginate(User::PAGINATE_COUNT);
        return view('librarian.users.index', compact('users'));
    }

    public function changeStatus(ChangeStatus $request)
    {
        User::where('id',$request->user_id)->update(['is_banned' => $request->status]);

        return back()->with(['message'=> 'User Status Changed.', 'type'=>'success']);
    }
}
