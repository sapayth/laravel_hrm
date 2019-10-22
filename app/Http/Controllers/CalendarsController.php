<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarsController extends Controller
{
    public function index() {
      return view('admins.calendars.all');
    }

    public function create() {
      return view('admins.calendars.create');
    }

    public function store(Request $request) {
      // return view('admins.calendars.create');
    }
}
