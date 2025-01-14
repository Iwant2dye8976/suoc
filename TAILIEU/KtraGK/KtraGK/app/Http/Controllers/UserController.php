<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(10);
        return view('user.index', compact('user'));
    }

    // Form thêm mới
    public function create()
    {
        return view('user.create');
    }

    // Lưu bản ghi mới
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'login_status' => 'required|in:success,failure',
            'user_role' => 'required|in:admin,user,guest',
            
        ]);

        User::create([
            'email' => $request->email,
            'password' => $request->password,
            'login_time' => now(),
            'login_status' => $request->login_status,
            'user_role' => $request->user_role,
        ]);

        return redirect()->route('user.index')->with('success', 'Thêm người dùng thành công!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:users,email,',
            'password' => 'nullable|min:6',
            'user_role' => 'required|in:admin,user,guest',
            'login_status' => 'required|in:success,failure',
        ]);

        $user->update([
            'email' => $request->email,
            'password' => $request->password ? $request->password : $user->password,
            'login_time' => now(),
            'login_status' => $request->login_status,
            'user_role' => $request->user_role,
            
        ]);

        return redirect()->route('user.index')->with('success', 'Cập nhập người dùng thành công!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Xóa người dùng thành công!');
    }
}
