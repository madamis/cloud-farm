<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarmingController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
