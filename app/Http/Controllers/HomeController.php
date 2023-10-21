<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home(){

        return view('layouts/profil');
    
    }

    function gallery(){

        return view('layouts/gallery');

    }

    function more(){

        return view('layouts/selengkapnya');

    }

}
