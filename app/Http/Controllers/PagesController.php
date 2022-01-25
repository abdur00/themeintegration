<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {

        return view('pages.index',);
    }
}
