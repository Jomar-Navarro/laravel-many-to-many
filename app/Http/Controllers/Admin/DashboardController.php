<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $count = Project::count();
        $last_project = Project::orderBy('created_at', 'desc')->first();

        return view('admin.home', compact('count', 'last_project'));
    }
}
