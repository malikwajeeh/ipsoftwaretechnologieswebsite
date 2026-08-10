<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Industry;
use App\Models\WhyChooseUs;
use App\Models\Process;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\ContactMessage;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroSection::where('is_active', true)->first();
        $about = AboutSection::where('is_active', true)->first();
        $services = Service::where('is_active', true)->orderBy('order_number')->get();
        $technologies = Technology::where('is_active', true)->orderBy('order_number')->get();
        $industries = Industry::where('is_active', true)->orderBy('order_number')->get();
        $whyChooseUs = WhyChooseUs::where('is_active', true)->orderBy('order_number')->get();
        $processes = Process::where('is_active', true)->orderBy('step_number')->get();
        $projects = Project::where('is_active', true)->where('is_featured', true)->orderBy('order_number')->take(6)->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order_number')->take(6)->get();
        $faqs = Faq::where('is_active', true)->orderBy('order_number')->get();
        
        return view('frontend.index', compact(
            'hero', 'about', 'services', 'technologies', 'industries',
            'whyChooseUs', 'processes', 'projects', 'testimonials', 'faqs'
        ));
    }
}