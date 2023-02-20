<?php

namespace App\Http\Controllers;

// use AmrShawky\Currency;
use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;



class CurrencyController extends Controller
{
    public function index(){

        return view('index', [
           'codes' => Currency::rates()->latest()->get()
        ]);
    }

    public function convert(Request $request){

        $converted = Currency::convert()
        ->from($request->from)
        ->to($request->to)
        ->amount($request->amount)
        ->round(2)
        ->get();    

       return back()->with([
            'conversion' => $request->amount . ' ' . $request->from . 'is equal to' .
             $converted . ' ' . $request->to,
             'amount' => $request-amount,
             'to' => $request-to,
             'from' => $request-from
       ]);     
              
    }
}
