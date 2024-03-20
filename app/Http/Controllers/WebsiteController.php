<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller {
    public function __construct() {
        
    }

    public function index() {
        return view('website.index');
    }
}

