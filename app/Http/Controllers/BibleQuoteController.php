<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BibleQuoteController extends Controller
{
    public function __invoke()
    {
        return view('bible');
    }
}
