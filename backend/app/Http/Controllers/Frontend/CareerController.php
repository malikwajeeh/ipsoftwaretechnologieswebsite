<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = JobOpening::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('frontend.careers', compact('jobs'));
    }
}