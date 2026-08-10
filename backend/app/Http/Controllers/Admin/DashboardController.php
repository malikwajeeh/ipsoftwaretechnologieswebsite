<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\HeroSection;
use App\Models\Industry;
use App\Models\JobOpening;
use App\Models\Process;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\SeoSetting;
use App\Models\TeamMember;
use App\Models\Technology;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WebsiteSetting;
use App\Models\WhyChooseUs;

class DashboardController extends Controller
{
    public function index()
    {
        $totalServices = Service::count();
        $totalProjects = Project::count();
        $totalTestimonials = Testimonial::count();
        $totalTeam = TeamMember::count();
        $totalTechnologies = Technology::count();
        $pendingMessages = ContactMessage::where('status', 'new')->count();
        $recentMessages = ContactMessage::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalServices', 'totalProjects', 'totalTestimonials',
            'totalTeam', 'totalTechnologies', 'pendingMessages', 'recentMessages'
        ));
    }
}
