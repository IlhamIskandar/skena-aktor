<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ContactController extends Controller
{
    //
    public function index(Request $request): View
    {
        return view('kontak');
    }
}
