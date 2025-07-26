<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }

    // عرض نموذج إنشاء مستخدم
    public function create()
    {
        return view('dashboard.users.create');
    }

    // حفظ مستخدم جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('dashboard.users.index')
            ->with('success', 'تم إنشاء المستخدم بنجاح ✅');
    }

    // عرض مستخدم معين
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    // حذف مستخدم
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard.users.index')
            ->with('success', 'تم حذف المستخدم بنجاح 🗑️');
    }
}
