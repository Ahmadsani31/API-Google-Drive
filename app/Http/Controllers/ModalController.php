<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function index(Request $request)
    {
        $modal = $request->segment(2);
        return view('modal.' . $modal);
    }
}
