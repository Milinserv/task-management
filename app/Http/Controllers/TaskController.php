<?php

namespace App\Http\Controllers;

use App\Data\TaskData;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $search): JsonResponse
    {
        $endDate = $search->input('endDate');
        $status = $search->input('status');

        $tasks = Task::query();

        if ($status) {
            $tasks->where('status', 'LIKE', "%$status%");
        }
        if ($endDate) {
            $tasks->whereDate('endDate', $endDate);
        }

        $tasks = $tasks->get();

        $res = TaskData::collect($tasks->toArray());

        return response()->json([
            'result' => $res
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskData $request): JsonResponse
    {
        $res = Task::query()->create($request->toArray());

        return response()->json([
            'result' => $res
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $res = TaskData::from(Task::findOrFail($id)->toArray());

        return response()->json([
            'result' => $res
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskData $request, string $id): JsonResponse
    {
        $res = Task::where('id', $id)->update($request->toArray());

        return response()->json([
            'result' => $res
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $res = Task::where('id', $id)->delete();

        return response()->json([
            'result' => $res
        ], 201);
    }
}
