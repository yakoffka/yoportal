<?php
declare(strict_types=1);

namespace App\Http\Controllers\TaskManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\TaskManager\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Blade;

/**
 * Обработка запросов, связанных с изменением задач раздела TaskManager
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /** @var User $user */
        $user = auth()->user();

        // return "hello, $user->name. You have " . $user->createdTasks()->count() . '. created tasks and '
        //     . $user->assignedTasks()->count() . ' assigned tasks.';

        // return Blade::render(
        //     'Hello, {{ $name }}. You have {{ $created }} created tasks and {{ $assigned }} assigned tasks.', [
        //     'name' => "$user->id|$user->name",
        //     'created' => $user->createdTasks()->count(),
        //     'assigned' => $user->assignedTasks()->count(),
        // ]);

        /** @var Collection $createdTasks */
        $createdTasks = $user->createdTasks;
        /** @var Collection $assignedTasks */
        $assignedTasks = $user->assignedTasks;

        return view('tm.tasks.index', compact('user','createdTasks', 'assignedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
