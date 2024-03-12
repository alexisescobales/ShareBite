<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterShopController extends Controller
{
    public function showRegisterShopForm()
    {
        return view('log_in_pages.register_shop');
    }
}
