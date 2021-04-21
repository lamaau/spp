<?php

namespace Modules\Master\Http\Controllers\Json;

use Illuminate\Support\Arr;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Master\Constants\SexConstant;
use Modules\Master\Constants\ReligionConstant;
use Modules\Master\Repository\InstallRepository;
use Modules\Master\Constants\SchoolLevelConstant;

class ConstantJsonController extends Controller
{
    /** @var Setting */
    protected $setting;

    public function __construct(InstallRepository $setting)
    {
        $this->setting = $setting;
    }

    public function format(array $args)
    {
        $result = [];

        foreach ($args as $key => $item) {
            $result[$key]['id'] = $key + 1;
            $result[$key]['name'] = $item[$key + 1];
        }

        return $result;
    }

    public function sex()
    {
        return response()->json([
            'data' => $this->format(collect(SexConstant::labels())->chunk(1)->toArray()),
        ], Response::HTTP_OK);
    }

    public function religion()
    {
        return response()->json([
            'data' => $this->format(collect(ReligionConstant::labels())->chunk(1)->toArray()),
        ], Response::HTTP_OK);
    }

    public function force()
    {
        $years = [];
        $firstYear = (int)date('Y') - 5;
        $j = 0;
        for ($i = $firstYear; $i <= ($firstYear + 10); $i++) {
            $j++;
            $years[$j]['id'] = $i;
            $years[$j]['name'] = (string) $i;
        }

        return response()->json(['data' => array_values($years)], Response::HTTP_OK);
    }
}
