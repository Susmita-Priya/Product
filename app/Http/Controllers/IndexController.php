<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function adminIndex()
    {
        return view('admin_dashboard.index');
    }
}
