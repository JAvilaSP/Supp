<?php

namespace App\Http\Controllers;

use App\Models\HistoricBalance;
use Illuminate\Http\Request;

class HistoricBalanceController extends Controller
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

        $meses = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre'
        ];
        $latestBalance = HistoricBalance::latest()->where('account_id', '=', auth()->user()->account_test->_id)->first();
        if (!isset($latestBalance) || empty($latestBalance)) {
            $newHistory = new HistoricBalance();
            $newHistory->month = "Enero";
            $newHistory->balance = auth()->user()->account_test->balance;
            $newHistory->account_id = auth()->user()->account_test->_id;

        }
        else {
            $i = array_search($latestBalance->month, $meses);
            if ($latestBalance->month === "Diciembre") {
                HistoricBalance::where('account_id', '=', auth()->user()->account_test->_id)->delete();
                $i = -1;
            }
            $newHistory = new HistoricBalance();
            $newHistory->month = $meses[$i+1];
            $newHistory->balance = auth()->user()->account_test->balance;
            $newHistory->account_id = auth()->user()->account_test->_id;

        }
        $newHistory->save();
        // return redirect()->route('dashboard');
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
    public function show(HistoricBalance $historicBalance)
    {
        //
        $myBalances = HistoricBalance::where('account_id', '=', auth()->user()->account_test->_id)->get();

        return $myBalances->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistoricBalance $historicBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistoricBalance $historicBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistoricBalance $historicBalance)
    {
        //
    }
}
