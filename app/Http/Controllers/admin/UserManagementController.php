<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserManagementController extends Controller
{
    public function allUsers()
    {
        $users = User::where('role', '!=', 'admin')->get();

        return view('admin.userManagement.allUsers', compact('users'));
    }
    public function activeUsers()
    {
        $users = User::where('status', 'active')->where('role', '!=', 'admin')->get();

        return view('admin.userManagement.active', compact('users'));
    }

    public function blockedUsers()
    {
        $users = User::where('status', 'blocked')->get();

        return view('admin.userManagement.blockUser', compact('users'));
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->userId);
        $user->status = $request->status;
        $user->save();
        return redirect()->back()->with('success', 'User status changed to '. $user->status . ' successfully');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'user deleted successfully');
    }
}
