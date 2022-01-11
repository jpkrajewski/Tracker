<?php

namespace App\Services;

use App\Models\Income;
use Carbon\CarbonImmutable;

class IncomeReportService
{

	public function getIncomeThisMonth()
	{
		return Income::where('user_id', auth()->user()->id)
				->whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])
				->get()
				->sum('amount');
	}

	public function getIncomeLastMonth()
	{
		return \DB::table('monthly_incomes')->where('user_id', auth()->user()->id)->where('created_at', CarbonImmutable::create('last day of last month'))->value('total_monthly_income');
	}

	public function getBestMonthlyIncome()
	{
		return \DB::table('monthly_incomes')->where('user_id', auth()->user()->id)->max('total_monthly_income');
	}
}