<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    $title = "Homepage";
    $projects = Project::limit(8)->get(); // prende i primi 8 post
    return view('guest.home', compact('title', 'projects'));
  }

  public function show_all()
  {
    $title = "All Projects";
    $projects = Project::paginate(10);
    return view('guest.all', compact('title', 'projects'));
  }
}