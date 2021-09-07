<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        if(Auth::user()->isAdmin){
            return view('admin.users.index',[
                'users' => User::all(),
            ]);
        }else{
           dd("You are not authorized to view this page");
        }

    }

    public function viewUser($id)
    {

        if(Auth::user()->isAdmin){
            return view('admin.users.view-user',[
                'user' => User::find($id),
            ]);
        }else{
            dd("You are not authorized to visit the page");
        }

    }
}
