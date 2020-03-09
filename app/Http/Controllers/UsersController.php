<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('users',
            ['model' => User::query()
                ->where('id', '!=', \Auth::user()->id)
                ->paginate(20)]);
    }

    public function edit(User $user)
    {
        if ((\Auth::user()->id != $user->id) and (!\Auth::user()->isAdmin)) {
            return redirect()->route('home')->with('error', 'Недостаточно полномочий');
        }
        return view('profile',
            ['model' => $user]);
    }

    public function update(Request $request, User $user)
    {
        if ((\Auth::user()->id != $user->id) and (!\Auth::user()->isAdmin)) {
            return redirect()->route('home')->with('error', 'Недостаточно полномочий');
        }

        $user->fill($request->input());
        $user->password = Hash::make($user->password);

        if ($user->save()) {
            return view('profile',
                ['model' => $user])
                ->with('success', 'Успешно сохранено!');
        }else{
            return view('profile',
                ['model' => $user])
                ->with('error', 'Ошибка сохранения!');
        }

    }

    public function toggleAdmin(User $user)
    {
        $user->isAdmin = !$user->isAdmin;
        $user->save();
        return redirect()->back()->with('success', 'Статус изменен!');
    }
}
