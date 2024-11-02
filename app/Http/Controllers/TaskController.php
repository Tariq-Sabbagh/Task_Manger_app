<?php

namespace App\Http\Controllers;

use App\Http\Requests\storetaskRequest;
use App\Http\Requests\updatetaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(storetaskRequest $request)
    {
        $task=Task::create($request->validated());
        return response()->json($task, 201);

    }
    public function index()
    {
        $tasks=Task::all();
        return response()->json($tasks, 200);
    }
    public function showOneTask($id)
    {
        try{
        $task=Task::findOrFail($id);
        return response()->json($task, 200);}
        catch(Exception $e)
        {
            return response()->json([
                'succses'=>false,
                'message'=>"not found id"
            ], 422);
        }
    }
    public function update(updatetaskRequest $request,$id)
    {
        try{
        $task=Task::findOrFail($id);
        $task->update($request->only('taskname','descriptions','priority'));
        return response()->json($task, 200);
    }
        catch(Exception $e)
        {
            return response()->json([
                'succses'=>false,
                'message'=>"not found id"
            ], 422);
        }

    }
    public function destroy($id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return response()->json([
            'succses'=>true,
            'message'=>"done deleted "
        ], 204);
    }
}
