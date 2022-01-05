<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonPeriod;

class UserController extends Controller
{
    public function index()
    {
        $birthday = CarbonImmutable::create('6/4/1999');
        $death = $birthday->addYears(80);

        $yesterday = CarbonImmutable::create('yesterday');
        $today = CarbonImmutable::create('now');
        $tomorrow = CarbonImmutable::create('tomorrow');

        $birthdayToYesterdayPeriod = CarbonPeriod::create($birthday, $yesterday);
        $tomorrowToDeathPeriod = CarbonPeriod::create($tomorrow, $death);


        $full = $birthday->diffInWeeks($death);
        $passed = $today->diffInWeeks($death);

        $percentRest = round($passed * 100 / $full);
        $percentUsed = 100 - $percentRest;

        return view('index', [
            'birthdayToYesterdayPeriod' => $birthdayToYesterdayPeriod,
            'today' => $today,
            'tomorrowToDeathPeriod' => $tomorrowToDeathPeriod,
            'full' => $full,
            'passed' => $passed,
            'percentRest' => $percentRest,
            'percentUsed' => $percentUsed,
        ]);
    }
}
