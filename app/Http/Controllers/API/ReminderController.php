<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use App\Models\ReminderMember;
use Illuminate\Http\Request;

use App\Http\Resources\ReminderResource;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Auth;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\ReminderMemberController;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminder = Reminder::all();

        return response(['reminder' => ReminderResource::collection($reminder), 'message' => 'Retreived Successfully'],200);
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
        'house_id' => 'required|exists:houses,id',
        'reminder' => 'required|max:255',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'max:1',
        'members.*.house_member_id' => 'required|exists:house_members,id',
        'members.*.is_visible' => 'max:1',
        'members.*.can_edit' => 'max:1',
        'members.*.is_active' => 'max:1'
      ]);

      if($validator->fails()) {
        return response(['error' => $validator->errors(),'message' => 'Validation Error']);
      }

      $data = Arr::add($data, 'poster_id', auth()->user()->id);

      //Create Reminder and Insert Members
      $reminder = Reminder::create($data);
      $reminder->members()->createMany($data['members']);
      $reminder->refresh();

      return response(['reminder' => new ReminderResource($reminder), 'message' => 'Registered Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function show(Reminder $reminder)
    {
        return response(['reminder' => new ReminderResource($reminder), 'message' => 'Retrieved Successfully'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reminder $reminder)
    {
      $reminder->update($request->all());

      return response(['reminder' => new ReminderResource($reminder), 'message' => 'Updated Successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reminder  $reminder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
