<?php

namespace App\Services;

use App\Models\Physique;

class PhysiqueProgressService
{
	private $strenghAttributes = array('weight' => 0,'benchpress' => 0,'deadlift' => 0,'squat' => 0);

	public function getRecentProgress(int $userId)
	{
		$reports = Physique::
						userStrengh($userId)
						->take(2)
						->get();						

		if ($reports->count() < 2)
		{
			return null;
		}

		$latestReport = $reports[0]->getAttributes();
		$previousReport = $reports[1]->getAttributes();

		$progress = array_merge(array(), $this->strenghAttributes);

		foreach($latestReport as $key => $value){
    		$progress[$key] = $value - $previousReport[$key];
		};

		return $progress;
	}

	public function getPersonalRecords(int $userId)
	{
		$data = Physique::userStrengh($userId)->get();

		$prArray = array_merge(array(), $this->strenghAttributes);

		$prArray['benchpress'] = $data->max('benchpress');
		$prArray['deadlift'] =$data->max('deadlift');
		$prArray['squat'] =$data->max('squat');

		return $prArray;
	}
}