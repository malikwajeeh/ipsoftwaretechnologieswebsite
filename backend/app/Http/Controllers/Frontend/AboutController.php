<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutSection::where('is_active', true)->first();
        $team = TeamMember::where('is_active', true)->orderBy('order_number')->take(4)->get();
        return view('frontend.about', compact('about', 'team'));
    }
}