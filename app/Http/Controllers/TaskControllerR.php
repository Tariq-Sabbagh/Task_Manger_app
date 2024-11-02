<?php

namespace App\Http\Controllers;

use App\Http\Requests\storetaskRequest;
use App\Http\Requests\updatetaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskControllerR extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task=Task::all();
        return response()->json($task, 200);
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
    public function store(storetaskRequest $request)
    {
        $task=Task::create($request->validated());
        return response()->json([
            'succes'=>true,
            'message'=>'the task was created',
            $task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        try
        {
            $task=Task::findOrFail($id);
            return response()->json(
                [
                    'succes'=>true,
                    'message'=>'your task:',
                    $task
                ]
                , 200);
        }
        catch(Exception $e)
        {
            return response()->json(
                [

                    'succes'=>false,
                    'message'=>'id not founded',


                ], 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updatetaskRequest $request,  $id)
    {
        try
        {
            $task=Task::findOrFail($id);
            $task->update($request->only('taskname','descriptions','priority'));
            return response()->json(
                [
                    'succes'=>true,
                    'message'=>'your task after update:',
                    $task
                ]
                , 200);
        }
        catch(Exception $e)
        {
            return response()->json(
                [

                    'succes'=>false,
                    'message'=>'id not founded',


                ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
            try{
            $task=Task::findOrFail($id);
            $task->delete();
            return response()->json([
                'succse'=>true,
                'message'=>"the task was deleted"
            ], 204);}
            catch(Exception $e)
            {
                return response()->json(
                    [

                        'succes'=>false,
                        'message'=>'id not founded',


                    ], 422);
            }


    }

}
