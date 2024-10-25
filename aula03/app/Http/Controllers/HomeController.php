<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index() {
        $text = "Primeiro exemplo de controller!!!";

        // dump($text);// var_dump(); die;//Helpers
        // dd($this);

        // return view('home',[
        //     "content"=>$text
        // ]);

        return View::make('home',[
            "title"=>"Página Inicial!!!",
            "content"=>$text
        ]);
    }
}
