<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoretodoRequest;
use App\Http\Requests\UpdatetodoRequest;
use App\Http\Resources\TodoResource;
use Illuminate\Http\JsonResponse;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():JsonResponse
    {
        $todos = Todo::all();
        return response()->json([
            "success" => true,
            "status" => 200,
            "message" => "Todo List",
            "data" => TodoResource::collection($todos),
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretodoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretodoRequest $request):Jsonresponse
    { 
        $todo = Todo::create($request->all());
        $results = new TodoResource($todo);
        return response()->json([
            "success" => true,
                "status" => 201,
                "message" => "Successfully added",
                "data" => $results
            ], 201);

        // -- Turns out this was unnecessary as the API handles failed requests without need for try/except intervention.

        // try {
        //     $todo = Todo::create($request->all());
        //     $results = new TodoResource($todo);
        //     return response()->json([
        //         "success" => true,
        //         "status" => 201,
        //         "message" => "Successfully added",
        //         "data" => $results
        //     ], 201);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         "success" => false,
        //         "status" => 404,
        //         "message" => "Unable to create Todo",
        //         "data" => ""
        //     ], 400);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id):JsonResponse
    {
        try {
            $todo = Todo::findOrFail($id);
            return response()->json([
                "success" => true,
                "status" => 200,
                "message" => "Todo with ID $id retrieved.",
                "data" => $todo
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "status" => 404,
                "message" => "Todo with ID $id not found.",
                "data" => ""
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetodoRequest  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetodoRequest $request, todo $todo):JsonResponse
    {
        $todo->update($request->all());
        $results = new TodoResource($todo);

        return response()->json([
            "success" => true,
                "status" => 201,
                "message" => "Todo with ID " . $todo->id . " successfully updated.",
                "data" => $results
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(todo $todo):JsonResponse
    {
        $results = $todo->delete();
        if ($results) {
            return response()->json([
                "success" => true,
                "status" => 418,
                "message" => "Todo with ID " . $todo->id . " deleted.",
                "data" => $todo
            ], 418);
        }
    }
}
