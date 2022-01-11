<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Physique;
use App\Models\Note;
use App\Models\Earning;
use App\Models\Goal;
use App\Services\PhysiqueProgressService;


class HomeController extends Controller
{
    private $physiqueProgressService;

    public function __construct(PhysiqueProgressService $service)
    {
        $this->physiqueProgressService = $service;
    }

    public function index()
    {
        $id = auth()->user()->id;

        return view('home', [
            'personalRecords' => $this->physiqueProgressService->getPersonalRecords($id),
            'latestGoal' => Goal::where('user_id', $id)->latest()->first(),
            'latestNotes' => Post::where('user_id', $id)->latest()->first()->notes->reverse(),
        ]);
    }
}
