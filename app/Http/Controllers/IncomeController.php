<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use Carbon\Carbon;
use App\Services\IncomeReportService;

class IncomeController extends Controller
{

    private $service;

    public function __construct(IncomeReportService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = auth()->user()->id;
        return view('incomes.index', [
            'allIncome' => Income::where('user_id', $id)->get(),
            'thisMonthIncome' => $this->service->getIncomeThisMonth(),
            'lastMonthIncome' => $this->service->getIncomeLastMonth(),
            'bestMonthIncome' => $this->service->getBestMonthlyIncome(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIncomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIncomeRequest $request)
    {
        Income::create($request->all());

        return back()->withSuccess('Income stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIncomeRequest  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
