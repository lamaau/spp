<?php

namespace Modules\GoenDataMaster\Views\Composers;

use Illuminate\View\View;
use Modules\GoenDataMaster\Repository\SettingRepository;

class SettingComposer
{
    protected $setting;

    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

    public function compose(View $view)
    {
    	$view->with('unpaid', $this->setting->unpaid()->count());
    }
}
