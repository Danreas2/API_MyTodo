<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::selectRaw('id, title, description, DATE_FORMAT(due_date, "%b %d") as formatted_due_date, completed, user_id, created_at, updated_at')->orderBy('due_date', 'asc')->get();

        return response()->json([
            'success' => true,
            'data'    => $data,
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'title'      => 'required',
            'description' => 'required',
            'due_date'  => 'required',
            'user_id' => 'required',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create
        $task = Task::create([
            'title'      => $request->title,
            'description' => $request->description,
            'due_date'  => $request->due_date,
            'completed' => $request->completed,
            'user_id' => $request->user_id,
        ]);

        if ($task) {
            return response()->json([
                'success' => true,
                'data'    => $task,
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Task::selectRaw('id, title, description, due_date, DATE_FORMAT(due_date, "%b %d") as formatted_due_date, completed, user_id, created_at, updated_at')->where('user_id', $id)->orderBy('due_date', 'asc')->get();

        return response()->json([
            'success' => true,
            'data'    => $data,
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'title'      => 'required',
            'description' => 'required',
            'due_date'  => 'required',
            'user_id' => 'required',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create
        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->completed = $request->completed;
        $task->user_id = $request->user_id;
        $task->save();

        $data = Task::find($id);

        if ($task) {
            return response()->json([
                'success' => true,
                'data'    => $data,
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json([
            'success' => true,
        ], 201);
    }
}
