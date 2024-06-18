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
        $cuentaOrigen = auth()->user()->account_test;
        $validated = $request->validate([
            'destination' => ['required', 'string','max:29', 'min:29', 'exists:App\Models\account_test,account_number',],
            'ammount' => ['required', 'integer', 'min:1' ,'max:'.$cuentaOrigen->balance ]
        ]);

        $newTransaction = new transaction();
        $newTransaction->sending_account = auth()->user()->account_test->account_number;
        $newTransaction->receiving_account = $validated['destination'];
        $newTransaction->ammount = $validated['ammount'];

        $newTransaction->save();

        $cuentaOrigen->balance -= $validated['ammount'];
        $cuentaOrigen->save();

        $cuentaDestino = account_test::where('account_number','=',$validated['destination'])->first();
        $cuentaDestino->balance += $validated['ammount'];
        $cuentaDestino->save();

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
