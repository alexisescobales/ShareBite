<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterShopController extends Controller
{
    public function showRegisterShopForm()
    {
        return view('register_shop');
    }
}
