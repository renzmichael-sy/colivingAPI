<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransactionDivision;
use Illuminate\Http\Request;

class TransactionDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        'transaction_id' => 'required|exists:transactions,id',
        'house_member_id' => 'required|exists:house_members,id',
        'amount_divided' => 'required',
        'amount_paid' => 'required',
        'percentage' => 'required',
        'is_saved' => 'max:1',
        'is_active' => 'max:1'
      ]);

      if($validator->fails()) {
        return response(['error' => $validator->errors(),'message' => 'Validation Error']);
      }

      $transaction_division = TransactionDivision::create($data);

      return response(['transaction' => new TransactionDivisionResource($transaction_division), 'message' => 'Registered Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionDivision  $transactionDivision
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDivision $transactionDivision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDivision  $transactionDivision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionDivision $transactionDivision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDivision  $transactionDivision
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDivision $transactionDivision)
    {
        //
    }
}
