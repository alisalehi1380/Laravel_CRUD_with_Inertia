<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Requestn;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
        return Inertia::render('Users/Index' , [
            'users' => User::query()
            ->when(Requestn::input('search') , function($query , $search) {
                $query->where('name' , 'like' , "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'can' => [
                    'edit' => Auth::user()->can('edit' , $user)
                ]
            ]),
            'filters' => Requestn::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create' , User::class)
            ]
        ]);
    }
    

    public function edit(User $user) 
    {
        return Inertia::render('Users/Edit' , ['user' => $user]);
    }

    public function update(User $user , Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required' , 'email'],
            'password' => 'required',
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect('/users');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
