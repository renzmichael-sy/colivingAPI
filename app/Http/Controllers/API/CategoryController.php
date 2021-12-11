<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response(['categories' => CategoryResource::collection($categories), 'message' => 'Retrieved Successfully'],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
          'name' => 'required|min:3|max:55|unique:categories',
          'is_active' => 'max:1'
        ]);

        if($validator->fails()){
          return response(['error' => $validator->errors(),'message' => 'Validation Error']);
        }

        $category = Category::create($data);

        return response(['category' => new CategoryResource($category), 'message' => 'Created Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response(['category' => new CategoryResource($category), 'message' => 'Retrieved Successfully'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
          'name' => 'required|min:3|max:55|unique:categories',
          'is_active' => 'max:1'
        ]);

        if($validator->fails()){
          return response(['error' => $validator->errors(),'message' => 'Validation Error']);
        }

        $category->update($data);

        return response(['category' => new CategoryResource($category), 'message' => 'Updated Successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
