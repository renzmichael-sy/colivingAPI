<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::all();

        return response(['transactions' => TransactionResource::collection($transaction), 'message' => 'Retreived Successfully'],200);
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
          'subcateg_id' => 'required|exists:subcategories,id',
          'amount' => 'required',
          'description' => 'max:255',
          'place' => 'max:45',
          'date' => 'required|date',
          'due_date' => 'date',
          'bill_peiod_start' => 'date',
          'bill_peiod_end' => 'date',
          'is_active' => 'max:1',
          'currency_code' => 'max:3',
          'division.*.home_member_id' => 'required',
          'division.*.amount_divided' => 'required',
          'division.*.amount_paid' => 'required',
          'division.*.percentage' => 'required',
          'division.*.is_saved' => 'max:1',
          'division.*.is_active' => 'max:1'
        ]);

        if($validator->fails()) {
          return response(['error' => $validator->errors(),'message' => 'Validation Error']);
        }

        $data = Arr::add($data, 'poster_id', auth()->user()->id);

        $transaction = Transaction::create($data);

        return response(['transaction' => new TransactionResource($transaction), 'message' => 'Registered Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return response(['transaction' => new TransactionResource($transaction), 'message' => 'Retrieved Successfully'],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return response(['transaction' => new TransactionResource($transaction), 'message' => 'Updated Successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
