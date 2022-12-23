<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $gifts = Gift::all();
        return view('home', compact('gifts'));
    }
}
