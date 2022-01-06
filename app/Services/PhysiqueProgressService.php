<?php

namespace App\Services;

use App\Models\Physique;
use Carbon\CarbonImmutable;

class PhysiqueProgressService
{
	private $strenghAttributes = array('weight' => 0,'benchpress' => 0,'deadlift' => 0,'squat' => 0);

	public function getRecentProgress(int $userId): array
	{
		$reports = Physique::
						userStrengh($userId)
						->take(2)
						->get();						



		if ($reports->count() < 2)
		{
			return null;
		}

		return $this->calculateProgress($reports[0], $reports[1]);
	}

	public function getWeeklyProgress(int $userId)
	{
		$reportLatest = Physique::userStrengh($userId)->first();
		$reportWeekAgo = Physique::
					userStrengh($userId)
					->estimateDays(7)
					->first();

		if(!$reportWeekAgo) return null;

		return $this->calculateProgress($reportLatest, $reportWeekAgo);
	}

	public function getMonthlyProgress(int $userId)
	{
		$reportLatest = Physique::userStrengh($userId)->first();
		$reportMonthAgo = Physique::
					userStrengh($userId)
					->estimateDays(30)
					->first();

		if(!$reportMonthAgo) return null;

		return $this->calculateProgress($reportLatest, $reportWeekAgo);
	}

	private function calculateProgress(Physique $actual, Physique $toCompare): array
	{
		$progressArray = $this->strenghAttributes;

		$actual = $actual->getAttributes();
		array_pop($actual);
		$toCompare = $toCompare->getAttributes();

		$created_at = array_pop($toCompare);

		foreach($actual as $key => $value){
    		$progressArray[$key] = $value - $toCompare[$key];
		};

		array_push($progressArray, CarbonImmutable::create($created_at)->format('d-m-Y'));

		return $progressArray;
	}

	public function getPersonalRecords(int $userId): array
	{
		$data = Physique::userStrengh($userId)->get();

		$prArray = $this->strenghAttributes;

		$prArray['benchpress'] = $data->max('benchpress');
		$prArray['deadlift'] = $data->max('deadlift');
		$prArray['squat'] = $data->max('squat');

		return $prArray;
	}
}