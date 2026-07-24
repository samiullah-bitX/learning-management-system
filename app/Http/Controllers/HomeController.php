<?php

namespace App\Http\Controllers;

use LMS\Modules\Courses\Repositories\Contracts\CourseRepositoryInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('messages');
    }

    /**
     * Show the application dashboard.
     */
    public function index(CourseRepositoryInterface $courseRepository)
    {
        $courses = $courseRepository->allAvailable();

        return view('home', compact('courses'));
    }

    /**
     * Show the stream and chat page.
     */
    public function stream()
    {
        return view('stream');
    }
}
