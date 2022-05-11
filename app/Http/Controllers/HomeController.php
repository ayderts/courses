<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ResetsPasswords;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $token = $request->query('token');

        // if no token redirect to front page

        return view('home')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
