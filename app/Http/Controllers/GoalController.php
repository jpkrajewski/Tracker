<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    use SoftDeletes;

    public function index()
    {
        $user = Auth::user();

        return view('goals.index', [
            'recentGoals' => $user->goals()->status('active')->get(),
            'finishedGoals' => $user->goals()->status('done')->get(),
            'pussiedOutGoals' => $user->goals()->status('canceled')->get(),
        ]);
    }

    public function store(StoreGoalRequest $request)
    {
        $goal = $request->all();
        $goal['user_id'] = Auth::user()->id;

        Goal::create($goal);

        return redirect()->back()->withSuccess('Goal added. NOW CRUSH IT.');
    }

    public function update(UpdateGoalRequest $request, Goal $goal)
    {
        $goal->fill($request->all());
        $goal->save();

        return redirect()->back()->withSuccess('Goal achieved. EASY.');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()->back()->withSuccess('Goal canceled.');
    }
}
