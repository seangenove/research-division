<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class PublicController extends Controller
{
    public function index() {
        return view('public.index');
    }

    public function ordinance() {
        return view('public.ordinance');
    }

    public function contactUs() {
        return view('public.contactUs');
    }
}
