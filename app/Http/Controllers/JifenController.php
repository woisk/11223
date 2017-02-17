<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JifenController extends Controller
{
    public function index()
    {
        return view('home.user.jifen');
    }
}
