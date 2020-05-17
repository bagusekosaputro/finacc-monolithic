<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\BookKeeping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BookKeepingController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            "transaction_type" => ["required"],
            "transaction_date" => ["required"],
            "amount" => ["required", "integer"],
            "description" => ["required", "string"],
            "img" => ["string"]
        ]);
    }

    public function saveTransaction(Request $request) 
    {
        $this->validator($request->all())->validate();
        
        return DB::transaction(function() use ($request) {
            $transaction_date = date('Y-m-d', strtotime($request->transaction_date));
            $array_date = explode("-", $request->transaction_date);

            $transaction = BookKeeping::create([
                'user_id' => Auth::user()->id,
                'transaction_type' => $request->transaction_type,
                'transaction_date' => $transaction_date,
                'amount' => $request->amount,
                'description' => $request->description,
                'day' => $array_date[0],
                'month' => $array_date[1],
                'year' => $array_date[2], 
            ]);
    
            return redirect('transaction/'.Auth::user()->id);;
        });
        
    }

    public function updateTransaction(Request $request) 
    {
        $this->validator($request->all())->validate();

        return DB::transaction(function() use ($request) {
            $transaction_date = date('Y-m-d', strtotime($request->transaction_date));
            $array_date = explode("-", $request->transaction_date);

            $transaction = BookKeeping::find($request->trx_id);
            
            $transaction->transaction_date = $transaction_date;
            $transaction->amount = $request->amount;
            $transaction->description = $request->description;
            $transaction->transaction_type = $request->transaction_type;
            $transaction->day = $array_date[0];
            $transaction->month = $array_date[1];
            $transaction->year = $array_date[2];

            $transaction->save();
        });
    }   

    public function deleteTransaction(Request $request) 
    {

    }
}