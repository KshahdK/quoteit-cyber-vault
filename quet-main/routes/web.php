<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quote;
use App\Models\User;

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    $quotes = Quote::latest()->get();
    return view('welcome', compact('quotes'));
})->name('home');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('Authentication.LogIn');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials =$request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {$request->session()->regenerate();
        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'Invalid email or password. Please try again.',
    ])->withInput($request->only('email'));
});

Route::get('/signup', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('Authentication.SignUp');
})->name('signup');

Route::post('/signup', function (Request $request) {$request->validate([
        'name' => 'required|string|min:2|max:50',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);$request->session()->regenerate();

    return redirect('/');
});

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();$request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::post('/quotes', function (Request $request) {
    if (!Auth::check()) {
        return redirect('/login');
    }

    $request->validate([
        'text' => 'required|string|min:3|max:255',
        'tag' => 'nullable|string|max:30',
    ]);

    Quote::create([
        'user_id' => Auth::id(),
        'author' => Auth::user()->name,
        'text' => $request->text,
        'tag' => $request->tag ?? 'Cyber Intel',
    ]);

    return redirect('/');
})->name('quotes.store');

Route::post('/quotes/{id}/delete', function ($id) {
    if (!Auth::check()) {
        return redirect('/login');
    }

    $quote = Quote::find($id);
    if ($quote && $quote->user_id == Auth::id()) {$quote->delete();
    }

    return redirect('/');
})->name('quotes.delete');