<?php

namespace Modules\GoenDataMaster\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\GoenDataMaster\Entities\Setting;

class SettingObserver
{
	public function creating(Setting $setting)
	{
		$setting->fill([
			'created_by' => Auth::id(),
		]);
	}
}