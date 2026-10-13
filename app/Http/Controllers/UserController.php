<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function show(): View
    {
        $users = DB::table('users')->get();
        return view('users', [
            'users' => $users
        ]);
    }

}

?>