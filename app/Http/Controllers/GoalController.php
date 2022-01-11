<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Http\Requests\StoreGoalRequest;
use App\Http\Requests\UpdateGoalRequest;
use Illuminate\Support\Facades\Auth;
use Cache;

class GoalController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if (!Cache::has('goals'))
        {
            Cache::remember('goals', 15, function() use ($user){
                    return $user->goals()->get();
            }); 
        }

        $goals = Cache::get('goals')->reverse();

        return view('goals.index', [
            'activeGoals' => $goals->where('status', 'active'),
            'finishedGoals' => $goals->where('status','done'),
            'canceledGoals' => $goals->where('status','canceled'),
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

        if($request['status'] == 'canceled')
        {
            return redirect()->back();
        }

        return redirect()->back()->withSuccess('Goal achieved. EASY.');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()->back()->withSuccess('Goal canceled.');
    }
}
