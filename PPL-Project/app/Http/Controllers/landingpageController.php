<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingpageController extends Controller
{
    // Fungsi index untuk me-return view landingpage
    public function index()
    {
        return view('landingpage'); // Return view dengan nama 'landingpage'
    }
}
