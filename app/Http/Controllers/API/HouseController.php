<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HouseResource;

use Illuminate\Support\Facades\Log;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::all();

        return response([ 'houses' => HouseResource::collection($houses), 'message' => 'Retrieved Successfully'], 200);
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

        $validator = Validator::make($data,[
          'name' => 'required|max:55',
          'address' => 'max:255',
          'is_active' => 'max:1'
        ]);

        if($validator->fails()){
          return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $completeData = array_merge($data, $this->generateUniqueCode());

        $house = House::create($completeData);

        return response(['house' => new HouseResource($house), 'message' => 'Created Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        Log::debug($house);
        return response(['house' => new HouseResource($house), 'message' => 'Retrieved Successfully'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        $house->update($request->all());

        return response(['house' => new HouseResource($house), 'message' => 'Updated Successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        $house->delete();

        return response(['message' => 'Deleted Successfully']);
    }

    public function generateUniqueCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 6;

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (House::where('code', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return array('code' => $code);

    }
}
