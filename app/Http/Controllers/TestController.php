<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index (){
        return view('crd.index');

    }
    public function show (){
        return view('crd.show');
    }
    public function add (){
        return view('crd.add')
             ->with('name','imad')
             ->with('prenom','saadaoui');
             
    }
    public function delete (){
        return view('crd.delete');
    }
}
