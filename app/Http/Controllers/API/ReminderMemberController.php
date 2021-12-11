<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ReminderMember;
use Illuminate\Http\Request;

class ReminderMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminder_members = ReminderMember::all();

        return response(['reminder_members' => ReminderMemberResource::collection($reminder_members), 'message' => 'Retreived Successfully'],200);
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
        'reminder_id' => 'required|exists:reminders,id',
        'house_member_id' => 'required|exists:house_members,id',
        'is_visible' => 'max:1',
        'can_edit' => 'max:1',
        'is_active' => 'max:1'
      ]);

      if($validator->fails()) {
        return response(['error' => $validator->errors(),'message' => 'Validation Error']);
      }

      $data = Arr::add($data, 'poster_id', auth()->user()->id);

      $reminder_member = ReminderMember::create($data);

      return response(['reminder_member' => new ReminderMemberResource($reminder_member), 'message' => 'Registered Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReminderMember  $reminder_member
     * @return \Illuminate\Http\Response
     */
    public function show(ReminderMember $reminder_member)
    {
        return response(['reminder_member' => new ReminderMemberResource($reminder_member), 'message' => 'Retrieved Successfully'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReminderMember  $reminder_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReminderMember $reminder_member)
    {
      $reminder_member->update($request->all());

      return response(['reminder_member' => new ReminderMemberResource($reminder_member), 'message' => 'Updated Successfully'],200);
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
