<?php

namespace App\Http\Controllers;

use App\Models\Physique;
use App\Http\Requests;
use App\Http\Requests\StorePhysiqueRequest;
use App\Http\Requests\UpdatePhysiqueRequest;
use App\Services\PhysiqueProgressService;

class PhysiqueController extends Controller
{
    private $physiqueProgressService;

    public function __construct(PhysiqueProgressService $service)
    {
        $this->physiqueProgressService = $service;
    }
    
    public function index()
    {
        $user = auth()->user();
        $id = $user->id;

        $physiques = $user->physiques->reverse();
        $latestPhysique = $physiques->first();

        return view('physiques.index', [
            'physiques' => $physiques,
            'latestPhysique' => $latestPhysique,
            'previousPhysique' => $physiques->skip(1)->first(),
            'recentReport' => $this->physiqueProgressService->getRecentProgress($id),
            'weeklyReport' => $this->physiqueProgressService->getWeeklyProgress($id),
            'monthlyReport' => $this->physiqueProgressService->getMonthlyProgress($id),
            'personalRecords' => $this->physiqueProgressService->getPersonalRecords($id),
        ]);
    }

    
    public function create()
    {
        return view('physiques.create');
    }

    public function store(StorePhysiqueRequest $request)
    {
        $physique = $request->validated();
        $physique['user_id'] = auth()->user()->id;

        $physiqueModel = Physique::create($physique);

        if($request->hasfile('physique'))
        {
            foreach($request->file('physique') as $image)
            {
                $physiqueModel->images()->create(['path' => $image->store('physiques', 'images')]);  
            }
        }

        return redirect()->route('physiques.index')->withSuccess('Physique progress saved. Stay grinding.');
    }

    public function show(Physique $physique)
    {
        return view('physiques.show', [
           'physique' => $physique,
        ]);
    }

    public function edit(Physique $physique)
    {
        //
    }

    public function update(UpdatePhysiqueRequest $request, Physique $physique)
    {
        //
    }

    public function destroy(Physique $physique)
    {
        //
    }
}
