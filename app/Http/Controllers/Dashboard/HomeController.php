<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * عرض الصفحة الرئيسية للوحة التحكم.
     */
    public function index()
    {
        return view('dashboard.index');
    }
}
