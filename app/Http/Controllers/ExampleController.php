<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homepage() {

        $class = "six";
        $students = [
            "John",
            "Mary",
            "Jane",
            "Chris",
            "Mark",
            "Peter"
        ];
        return view('homepage', [
            'class' => $class, 'students'=>$students
        ]);
    }

    public function aboutPage() {
        return '<h1>About us</h1><a href="/">Back to homepage</a>';
    }
}
