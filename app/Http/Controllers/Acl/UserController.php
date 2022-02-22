<?php

namespace App\Http\Controllers\Acl;

use Inertia\Response;
use App\Http\Controllers\Controller;
use App\Inertable\Acl\UserTable;

class UserController extends Controller
{
    public function index(): Response
    {
        return inertia('user/index')->inertable(new UserTable)->title(__('Daftar pengguna'));
    }
}
