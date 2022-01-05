<?php

namespace App\Services;

use App\Models\Physique;

class PhysiqueProgressService
{
	public static function getPhysiqueProgress(int $userId)
	{
		$reports = Physique::
						select('kilograms','benchpress','deadlift','squat')
						->where('user_id', $userId)
						->orderBy('created_at','desc')
						->take(2)
						->get();

		$latestReport = $reports[0]->getAttributes();
		$previousReport = $reports[1]->getAttributes();

		$progress = array_fill_keys(
  			array('kilograms','benchpress','deadlift','squat'), 0);

		foreach($latestReport as $key => $value){
    		$progress[$key] = $value - $previousReport[$key];
		};

		return $progress;
	}

	public static function getPersonalRecords(int $userId)
	{
		
	}
}