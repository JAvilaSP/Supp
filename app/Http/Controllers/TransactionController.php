<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\User;
use App\Models\account_test;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function perderDinero()
    {
        //
        // auth()->user()->account_test->balance = 3399;
        $lacuenta = auth()->user()->account_test;
        $lacuenta->balance -= 100;
        // account_test::where('account_owner', '=', '6667517d626aeff78b082287')->balance = account_test::where('account_owner', '=', '6667517d626aeff78b082287')->balance + 100;
        // auth()->user()->email->update();
        $lacuenta->save();
    }
    public function ganarDinero()
    {
        //
        // auth()->user()->account_test->balance = 3399;
        $lacuenta = auth()->user()->account_test;
        $lacuenta->balance += 100;
        // account_test::where('account_owner', '=', '6667517d626aeff78b082287')->balance = account_test::where('account_owner', '=', '6667517d626aeff78b082287')->balance + 100;
        // auth()->user()->email->update();
        $lacuenta->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaction $transaction)
    {
        //
    }
}
