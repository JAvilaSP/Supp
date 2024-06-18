<?php

namespace App\Http\Controllers;

use App\Models\account_test;
use App\Models\User;
use Illuminate\Http\Request;

class AccountTestController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'accountType' => ['required', 'string', 'max:80'],
            'accountNumber' => ['required', 'string', 'max:29', 'min:29', 'unique:App\Models\account_test,account_number']
        ]);

        $newAccount = new account_test();
        $newAccount->account_type = $validated['accountType'];
        $newAccount->account_number = $validated['accountNumber'];
        $newAccount->account_owner = auth()->user()->getAuthIdentifier();
        $newAccount->balance = 1000;


        $newAccount->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(account_test $account_test, Request $request)
    {
        // $result = account_test::where('account_owner', '=', auth()->user()->getAuthIdentifier())->get();
        $result = [
            "historic_balance" => auth()->user()->account_test->historic_balance,
            "balance" => auth()->user()->account_test->balance,
        ];

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(account_test $account_test)
    {
        //
        // $newAccount = auth()->user()->account_test;
        // $meses = [
        //     'Enero',
        //     'Febrero',
        //     'Marzo',
        //     'Abril',
        //     'Mayo',
        //     'Junio',
        //     'Julio',
        //     'Agosto',
        //     'Septiembre',
        //     'Octubre',
        //     'Noviembre',
        //     'Diciembre'
        // ];

        // $lastMonth = end($newAccount->historic_balance)["month"];

        // if (!$lastMonth || !isset($lastMonth) || empty($lastMonth) || $lastMonth === 'Diciembre') {
        //     $newMonth = new \stdClass();
        //     $newMonth->month = $meses[0];
        //     // $newMonth->balance = $newAccount->balance;
        //     $newMonth->balance = 400;
        //     $newAccount->historic_balance[] = $newMonth;
        // }
        // elseif (in_array($lastMonth, $meses)) {
        //     $index = array_search($lastMonth, $meses);
        //     $newMonth = new \stdClass();
        //     $newMonth->month = $meses[$index+1];
        //     $newMonth->balance = 500;
        //     $newAccount->historic_balance[] = $newMonth;
        // }
        // else {
        //     auth()->user()->account_test->balance = 666;
        //     auth()->user()->account_test->balance->save();
        // }
        // $newAccount->save();



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, account_test $account_test)
    {
        //
        return auth()->user()->account_test->balance;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(account_test $account_test)
    {
        //
        account_test::destroy(auth()->user()->account_test->_id);

    }
}
