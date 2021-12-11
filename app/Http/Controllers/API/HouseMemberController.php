<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HouseMember;
use Illuminate\Http\Request;
use App\Http\Resources\HouseMemberResource;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;

class HouseMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = HouseMember::all();

        return response(['house_members' => HouseMemberResource::collection($members), 'message' => 'Retreived Successfully'],200);
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
          'user_id' => 'required|exists:users,id',
          'house_id' => 'required|exists:houses,id',
          'is_active' => 'max:1',
          'is_accepted' => 'max:1'
        ]);

        if($validator->fails()) {
          return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $house_member = HouseMember::create($data);

        return response(['house_member' => new HouseMemberResource($house_member), 'message' => 'Registered Successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseMember  $houseMembers
     * @return \Illuminate\Http\Response
     */
    public function show(HouseMember $houseMembers)
    {
        Log::debug($houseMembers);
        return response(['house_member' => new HouseMemberResource($houseMembers), 'message' => 'Retrieved Successfully'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseMember  $houseMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseMember $houseMembers)
    {
      Log::debug($request);
      Log::debug($houseMembers);
      $houseMembers->update($request->all());

      return response(['house_member' => new HouseMemberResource($houseMembers), 'message' => 'Updated Successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseMember  $houseMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseMember $houseMembers)
    {
        //
    }
}
