<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)->with('category')->orderBy('order_number')->get();
        $categories = ProjectCategory::where('is_active', true)->orderBy('order_number')->get();
        return view('frontend.projects', compact('projects', 'categories'));
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->where('is_active', true)->with('category')->firstOrFail();
        $relatedProjects = Project::where('is_active', true)->where('id', '!=', $project->id)->orderBy('order_number')->take(3)->get();

        $seo_title = ($project->title ?? 'Project') . ' | IP Software Technologies';
        $seo_description = $project->description ?? 'IP Software Technologies - ' . $project->title;
        $seo_keywords = $project->title . ', IP Software Technologies, software project';

        return view('frontend.project-detail', compact('project', 'relatedProjects', 'seo_title', 'seo_description', 'seo_keywords'));
    }
}