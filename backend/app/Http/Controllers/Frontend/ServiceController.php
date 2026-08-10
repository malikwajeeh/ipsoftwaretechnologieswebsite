<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('order_number')->get();
        return view('frontend.services', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $relatedServices = Service::where('is_active', true)->where('id', '!=', $service->id)->orderBy('order_number')->take(3)->get();
        return view('frontend.service-detail', compact('service', 'relatedServices'));
    }
}