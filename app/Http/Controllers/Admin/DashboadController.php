<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboadController extends Controller
{
    /**
     * Dashboard
     */
    public function dashboard(){

        return view('backend.dashboard');
    }
}
