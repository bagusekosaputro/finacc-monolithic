<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\BookKeeping;
use Illuminate\Support\Facades\Validator;

class BookKeepingController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            "transaction_type" => ["required"],
            "transaction_date" => ["required"],
            "amount" => ["required", "float"],
            "description" => ["required", "text"],
            "img" => ["string"]
        ]);
    }
}
