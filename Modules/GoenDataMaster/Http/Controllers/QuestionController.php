<?php

namespace Modules\GoenDataMaster\Http\Controllers;

use Illuminate\Routing\Controller;

class QuestionController extends Controller
{
    public function index()
    {
        return view('question.index', [
            'title' => 'Kelola Bank Soal',
        ]);
    }
}
