<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function rating()
    {
        $lessonsCount = Lesson::query()->count();

        $students = User::query()
            ->student()
            ->whereHas('lessons', fn($q) => $q->where('lesson_user.status', Lesson::COMPLETED_STATUS))
            ->withCount(['lessons' => fn($q) => $q->where('status', Lesson::COMPLETED_STATUS)])
            ->latest('lessons_count')
            ->paginate(50);

        $students->through(fn($s, $index) => [
            'info' => $s->name . ', ' . $s->email,
            'progress' => round((100 / $lessonsCount) * $s->lessons_count) . '%',
            'place' => $students->currentPage() * $students->perPage() - $students->perPage() + 1 + $index,
        ]);

        return inertia('Rating', compact('students'));
    }

    public function studentsSortByViewed()
    {
        $students = User::query()
            ->student()
            ->withCount(['lessons' => fn($q) => $q->whereIn('lesson_user.status', [Lesson::VIEWED_STATUS, Lesson::COMPLETED_STATUS])])
            ->latest('lessons_count')
            ->paginate(50)
            ->through(fn($s) => [
                'info' => $s->name . ', ' . $s->email,
                'lessonsCount' => $s->lessons_count
            ]);

        return inertia('StudentsSortByViewed', compact('students'));
    }

    public function lessonsSortByViews()
    {
        $lessons = Lesson::query()
            ->withCount([
                'users' =>
                fn($q) => $q->student()->whereIn('lesson_user.status', [Lesson::VIEWED_STATUS, Lesson::COMPLETED_STATUS])
            ])
            ->latest('users_count')
            ->paginate(50)
            ->through(fn($s) => [
                'name' => Str::limit($s->name),
                'usersCount' => $s->users_count
            ]);

        return inertia('LessonsSortByViews', compact('lessons'));
    }

    public function studentModal($viewedLessons = [])
    {
        $students = User::query()
            ->student()
            ->whereHas('lessons')
            ->withCount(['lessons' => fn($q) => $q->whereIn('status', [Lesson::VIEWED_STATUS, Lesson::COMPLETED_STATUS])])
            ->latest('lessons_count')
            ->paginate(50)
            ->through(fn($s, $index) => [
                'id' => $s->id,
                'name' => $s->name,
                'email' => $s->email,
                'lessonsCount' => $s->lessons_count,
            ]);

        return inertia('StudentModal', compact('students', 'viewedLessons'));
    }

    public function studentShow(User $user)
    {
        $viewedLessons = $user->lessons()->whereIn('lesson_user.status', [Lesson::VIEWED_STATUS, Lesson::COMPLETED_STATUS])->pluck('name');

        return $this->studentModal($viewedLessons);
    }

    public function lessonModal($viewedStudents = [])
    {
        $lessons = Lesson::query()
            ->withCount([
                'users' =>
                    fn($q) => $q->student()->whereIn('lesson_user.status', [Lesson::VIEWED_STATUS, Lesson::COMPLETED_STATUS])
            ])
            ->latest('users_count')
            ->paginate(50)
            ->through(fn($s, $index) => [
                'id' => $s->id,
                'name' => $s->name,
                'usersCount' => $s->users_count,
            ]);

        return inertia('LessonModal', compact('lessons', 'viewedStudents'));
    }

    public function lessonShow(Lesson $lesson)
    {
        $viewedStudents = $lesson->users()->whereIn('lesson_user.status', [Lesson::VIEWED_STATUS, Lesson::COMPLETED_STATUS])->limit(20)->get(['name', 'email']);

        return $this->lessonModal($viewedStudents);
    }
}
