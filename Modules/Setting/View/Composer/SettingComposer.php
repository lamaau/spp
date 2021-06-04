<?php

namespace Modules\Setting\View\Composer;

use Illuminate\View\View;
use Modules\Setting\Repository\InstallRepository;

class SettingComposer
{
    /**
     * The setting repository implementation.
     *
     * @var InstallRepository
     */
    protected $setting;

    /**
     * Create a new setting composer
     *
     * @param InstallRepository $setting
     * @return void
     */
    public function __construct(InstallRepository $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Bind data to the view
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        if ($this->setting->first()) {
            $view->with('setting', $this->setting->first());
        }
    }
}
