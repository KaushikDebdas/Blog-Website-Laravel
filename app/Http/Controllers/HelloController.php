<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function Manush()
    {
        # code...
        //echo 'Thik Ase Eita M A N U S H';
        return view('about');
    }

    public function Guru()
    {
        # code...
        echo 'Thik Ase Eita G U R U ';
    }
    public function ABOUT()
    {
        # code...
        return view('about');
    }
    public function CONTACT()
    {
        # code...
        return view('contact');
    }
}
