<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Resources\SubCategoryResource;

use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $subcategories = SubCategory::all();

      return response(['subcategories' => SubCategoryResource::collection($subcategories), 'message' => 'Retrieved Successfully'],200);
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
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|min:3|max:55',
        'is_active' => 'max:1'
      ]);

      if($validator->fails()){
        return response(['error' => $validator->errors(),'message' => 'Validation Error']);
      }

      $subcategory = SubCategory::create($data);

      return response(['subcategory' => new SubCategoryResource($subcategory), 'message' => 'Created Successfully'],200);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\SubCategory  $sucbategory
   * @return \Illuminate\Http\Response
   */
  public function show(SubCategory $subcategory)
  {
      return response(['subategory' => new SubCategoryResour($subcategory), 'message' => 'Retrieved Successfully'],200);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\SubCategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, SubCategory $subcategory)
  {
      $data = $request->all();
      $validator = Validator::make($data, [
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|min:3|max:55',
        'is_active' => 'max:1'
      ]);

      if($validator->fails()){
        return response(['error' => $validator->errors(),'message' => 'Validation Error']);
      }

      $subcategory->update($data);

      return response(['subategory' => new SubCategoryResource($subcategory), 'message' => 'Updated Successfully'],200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\SubCategory  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(SubCategory $category)
  {
      //
  }
}
