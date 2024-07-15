<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $users = User::all();
        return view('layout.header', compact('users','orders'));
    }

    public function edit($id)
    {
        $orders = Order::all();
        $users = User::all();
        $user = User::find($id);
        return view('users.edit', compact('user','users','orders'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->avt =str_replace("public","storage", $request->avt->store('public/img'));
        // $user->avt = $request->avt;
        $user->name = $request->name;
        $user->save();
        return redirect('editor');
    }

    public function showAssignRoleForm()
    {
        $orders = Order::all();
        $users = User::all();
        return view('admin.assign-role', compact('users','orders'));
    }

    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('assign.role-form');
    }

    
}
