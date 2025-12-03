<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPetitionsController extends Controller
{
    public function index() {
        return view('admin.petitions.index');
    }
}
