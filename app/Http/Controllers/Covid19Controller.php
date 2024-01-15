<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Covid19Controller extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

}
