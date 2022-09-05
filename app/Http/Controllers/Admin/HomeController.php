<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index() {

        $user = User::find(1);

        $data = [
            'user' => $user
        ];

        return view('admin.home', $data);
    }
}
