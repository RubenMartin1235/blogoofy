<?php

namespace App\Http\Controllers;

use App\Models\Goof;
use App\Models\Tag;
use App\Models\User;
use App\Models\Rating;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Auth;

class AdminDashboardController extends Controller
{
    public function show_users(Request $request) {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        $users = User::all();
        return view('admin.users.index',
            [
                'users'=>$users,
            ]
        );
    }
    public function edit_user(Request $request, User $user) {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update_user(Request $request, User $user)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        $user->save();
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
        ]);
        $user->update($validated);

        return redirect(route('dashboard.admin.users'));
    }

    public function delete_user(Request $request, User $user) {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        return view('admin.users.delete', [
            'user' => $user,
        ]);
    }

    public function destroy_user(Request $request, User $user)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        $user->delete();
        return redirect(route('dashboard.admin.users'));
    }


    public function show_goofs(Request $request) {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        $goofs = Goof::all();
        return view('admin.goofs.index',
            [
                'goofs'=>$goofs,
            ]
        );
    }
    public function edit_goof(Request $request, Goof $goof) {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        return view('admin.goofs.edit', [
            'goof' => $goof,
        ]);
    }

    public function update_goof(Request $request, Goof $goof)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        $goof->save();
        $validated=$request->validate([
            'ownerid' => 'required|integer',
            'title'=>'required|string|max:255',
            'body'=>'required|string|max:255',
        ]);
        $goof->update($validated);

        return redirect(route('dashboard.admin.goofs'));
    }

    public function delete_goof(Request $request, Goof $goof) {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        return view('admin.goofs.delete', [
            'goof' => $goof,
        ]);
    }

    public function destroy_goof(Request $request, Goof $goof)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect(route('dashboard'));
        }
        $goof->delete();
        return redirect(route('dashboard.admin.goofs'));
    }
}
