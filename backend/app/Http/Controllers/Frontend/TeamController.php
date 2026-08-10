<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        $team = TeamMember::where('is_active', true)->orderBy('order_number')->get();
        return view('frontend.team', compact('team'));
    }
}