<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function __construct()
   {
       $this->middleware(['auth','verified']);
   }

   public function index()
   {


       if(Auth::user()->isAdmin){
             return view('admin.dashboard');
       }else{
        return view('dashboard');
       }

   }

   public function adminpanel()
   {
    if(Auth::user()->isAdmin){
        return view('admin.dashboard');
  }else{
   return view('dashboard');
  }

   }



}
