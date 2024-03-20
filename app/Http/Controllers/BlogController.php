<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller {
    public function __construct() {
        
    }

    public function index() {
        return view('website.blog');
    }
    public function view() {
        return view('website.blog-single');
    }
}
