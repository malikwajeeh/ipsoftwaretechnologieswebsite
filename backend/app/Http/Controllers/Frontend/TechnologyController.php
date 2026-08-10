<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::where('is_active', true)->orderBy('order_number')->get();
        return view('frontend.technologies', compact('technologies'));
    }
}