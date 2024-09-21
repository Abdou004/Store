<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request) {
            $users = [
              ['id' => '1' , 'nom' => 'Abdou' , 'metier' => 'Experte technique'],
              ['id' => '2' , 'nom' => 'Pro' , 'metier' => 'Directeur'],
              ['id' => '3' , 'nom' => 'Mohamed' , 'metier' => 'Jardinier'],
            ];
        return view('home',compact('users'));
    }
}