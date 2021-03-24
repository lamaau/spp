<?php

namespace Modules\Utils;

use Illuminate\Support\Carbon;

class PlanDuration
{
	protected $start;

	protected $finish;

	public function start()
	{
		$this->start = Carbon::now();
	}

	public function finish()
	{
		$this->finish = Carbon::now();
	}

	public function duration()
	{
		return $this->start->diffInMonths($this->finish);
	}
}