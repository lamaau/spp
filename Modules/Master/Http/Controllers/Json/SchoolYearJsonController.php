<?php

namespace Modules\Master\Http\Controllers\Json;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Master\Repository\SchoolYearRepository;

class SchoolYearJsonController extends Controller
{
    protected $school_year;

    public function __construct(SchoolYearRepository $school_year)
    {
        $this->school_year = $school_year;
    }

    /**
     * Select school year
     *
     * @return JsonResponse
     */
    public function select(): JsonResponse
    {
        $result = [];

        foreach ($this->school_year->select() as $key => $value) {
            $result[$key]['id'] = $value->id;
            $result[$key]['name'] = $value->year;
        }

        return response()->json(['data' => $result], Response::HTTP_OK);
    }
}
