<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LinksController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('index');
    }

    public function laravel()
    {
        return view('manuales.laravel.index');
    }

    public function javascript($clase = null)
    {
        if ($clase !== null) {
            return view("manuales.javascript.$clase.index");
        }
        return redirect('/manuales/javascript/clase01');
    }

    public function conectemos()
    {
        return view('manuales.conectemos.index');
    }

    public function forbiddenPage()
    {
        return view('forbidden');
    }

    public function forbidden(Request $request)
    {
        $manual = \App\Manual::where('name', $request->manual)->first();

        $checkLink = \App\UserManual::where('user_id', Auth::user()->id)->where('manual_id', $manual->id)->first();

        if ($checkLink === null) {

            $link = \App\UserManual::create([
                'user_id' => Auth::user()->id,
                'manual_id' => $manual->id,
            ]);

            return redirect('/forbidden')->with('forbidden', 1);
        }

        return redirect('/forbidden')->with('forbidden', 2);
    }

    public function admin()
    {
        $users = \App\User::all();
        $manuals = \App\Manual::all();
        $userManual = \App\UserManual::all();

        $parameters = [
            'users' => $users,
            'manuals' => $manuals,
            'userManual' => $userManual
        ];
        return view('admin', $parameters);
    }
}
