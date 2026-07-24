<?php

namespace App\Http\Controllers;

use App\Entities\Course;
use App\Http\Requests\Lesson\CreateRequest;
use App\Traits\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LMS\Modules\Lessons\Repositories\Contracts\LessonRepositoryInterface;
use LMS\Modules\Lessons\Usecases\Contracts\{
    CreateLessonUsecaseInterface,
    DeleteLessonUsescaseInterface,
    ShowLessonUsecaseInterface,
    UpdateLessonUsescaseInterface
};

class LessonController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Intentionally left blank for resource consistency.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('lessons.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request, CreateLessonUsecaseInterface $createLessonUsecase)
    {
        try {
            $result = $createLessonUsecase->handle($request->all(), auth()->user()->id);

            if ($result['data']) {
                flash('Clase creada correctamente');
            } else {
                flash(implode('-', $result['errors']), 'error');
                throw new \Exception('Error creating lesson');
            }

            return redirect()->route('courses.edit', $request->get('course_id'));
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, ShowLessonUsecaseInterface $lessonUsecase)
    {
        $response = $lessonUsecase->handle($id, Auth::user()->id);
        $lesson = $response['data']['lesson'];
        $subscribed = $response['data']['subscribed'];

        if (! $subscribed) {
            return redirect()->route('courses.show', $lesson->course->id);
        }

        return view('lessons.show', compact('lesson', 'subscribed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, LessonRepositoryInterface $lessonRepository)
    {
        $lesson = $lessonRepository->findById($id);

        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, UpdateLessonUsescaseInterface $updateLessonUsescase)
    {
        try {
            $updateLessonUsescase->handle($id, $request->all());
            flash('Lección guardada correctamente');
        } catch (\Exception $e) {
            flash('No se ha podido guardar la lección', 'error');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, DeleteLessonUsescaseInterface $deleteLessonUsescase)
    {
        try {
            $deleteLessonUsescase->handle($id);
            flash('Lección eliminada correctamente');
        } catch (\Exception $e) {
            flash('No se ha podido eliminar la lección', 'error');
        }

        return redirect()->back();
    }
}
