<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        return view('home', compact('courses'));
    }

    public function course(Course $course)
    {
        return view('course', [
            'course' => $course
        ]);
    }

    public function materials(Chapter $chapter)
    {
        return view('materials', [
            'chapter' => $chapter
        ]);
    }

    public function settings()
    {
        return view('settings');
    }

    public function test()
    {
        return view('test');
    }

    public function testShow()
    {
        return view('main-test');
    }
}
