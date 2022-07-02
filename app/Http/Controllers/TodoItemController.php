<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoItemRequest;
use App\Http\Requests\UpdateTodoItemRequest;
use App\Http\Resources\TodoItemCollection;
use App\Http\Resources\TodoItemResource;
use App\Models\TodoItem;

class TodoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        return new TodoItemCollection(TodoItem::all());
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
     * @param  \App\Http\Requests\StoreTodoItemRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTodoItemRequest $request)
    {
        $validatedRequest = $request->validated();
        TodoItem::create($validatedRequest);

        return response()->json(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function show(TodoItem $todoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoItem  $todoItem
     * @return mixed
     */
    public function edit(TodoItem $todoItem)
    {
        return new TodoItemResource($todoItem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodoItemRequest  $request
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTodoItemRequest $request, TodoItem $todoItem)
    {
        $validatedRequest = $request->validated();
        $todoItem->update($validatedRequest);

        return response()->json(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();
        return response()->noContent();
    }
}
