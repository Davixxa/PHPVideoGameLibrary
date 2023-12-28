<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUserRole()
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->isAdmin()) {
                return 'admins';
            } else {
                return 'users';
            }
        }

        return 'guest';
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/account')->with('status', 'Logged in');
        }

        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/account')->with('status', 'Logged out');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (Hash::check($request->input('current_password'), $user->password)) {
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect('/account')->with('success', 'Password changed successfully');
        }

        return redirect('/account')->withErrors(['current_password' => 'Incorrect current password']);

    }

    public function showGames()
    {
        $games = Game::all();
        $role = $this->getUserRole();
        return view($role . '.games.index', compact('games'));
    }

    public function showCategories()
    {
        $categories = Category::all();
        return view('admins.categories.index', compact('categories'));
    }

    public function addGame(Request $request)
    {
        $categories = Category::pluck('name', 'id');
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'publishing_date' => 'required|date',
            'category' => 'required|string',
        ]);

        Game::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'publishing_date' => $request->input('publishing_date'),
            'category' => $request->input('category'),
        ]);

        return redirect()->route('admins.showGames', compact('categories'))->with('success', 'Game added successfully');
    }

    public function editGame($id)
    {
        $categories = Category::pluck('name', 'id');
        $game = Game::findOrFail($id);
        $role = $this->getUserRole();
        return view($role . '.games.edit', compact('game', 'categories'));
    }

    public function updateGame(Request $request, $id)
    {
        $categories = Category::pluck('name', 'id');
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'publishing_date' => 'required|date',
            'category' => 'required|string',
        ]);

        $game = Game::findOrFail($id);
        $game->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'publishing_date' => $request->input('publishing_date'),
            'category' => $request->input('category'),
        ]);
        $role = $this->getUserRole();

        return redirect()->route($role . '.showGames', compact('categories'))->with('success', 'Game updated successfully');
    }

    public function deleteGame($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('admins.showGames')->with('success', 'Game deleted successfully');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admins.showCategories')->with('success', 'Category added successfully');
    }

    public function showAddGameForm()
    {
        $categories = Category::pluck('name', 'id');
        return view('admins.games.add', compact('categories'));
    }

    public function showAddCategoryForm()
    {
        return view('admins.categories.add');
    }

    public function showAccount() {
        return view ('accounts.account');
    }
}
