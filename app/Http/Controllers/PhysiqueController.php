<?php

namespace App\Http\Controllers;

use App\Models\Physique;
use App\Http\Requests;
use App\Http\Requests\StorePhysiqueRequest;
use App\Http\Requests\UpdatePhysiqueRequest;
use App\Services\PhysiqueProgressService;

class PhysiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $report = PhysiqueProgressService::getPhysiqueProgress(auth()->user()->id);

        $physiques = auth()->user()->physiques->reverse();
        $latestPhysique = $physiques->first();
        
        return view('physiques.index', [
            'physiques' => $physiques,
            'latestPhysique' => $latestPhysique,
            'previousPhysique' => $physiques->get(1),
            'report' => $report,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('physiques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhysiqueRequest  $request
     * @return \Illuminate\Http\Response
     */
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

        return view('physiques.index')->withSuccess('Physique progress saved. Stay grinding.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Physique  $physique
     * @return \Illuminate\Http\Response
     */
    public function show(Physique $physique)
    {
        return view('physiques.show', [
           'physique' => $physique,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Physique  $physique
     * @return \Illuminate\Http\Response
     */
    public function edit(Physique $physique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhysiqueRequest  $request
     * @param  \App\Models\Physique  $physique
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhysiqueRequest $request, Physique $physique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Physique  $physique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physique $physique)
    {
        //
    }
}
