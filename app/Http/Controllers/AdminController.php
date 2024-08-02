<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard_admin(){
        return view('admin/dashboard_admin');
    }
    
}
