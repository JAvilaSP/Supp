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
    }

    /**
     * Display the specified resource.
     */
    public function show(account_test $account_test, Request $request)
    {
        // $result = account_test::where('account_owner', '=', auth()->user()->getAuthIdentifier())->get();
        $result = auth()->user()->account_test->historic_balance;

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(account_test $account_test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, account_test $account_test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(account_test $account_test)
    {
        //
    }
}
