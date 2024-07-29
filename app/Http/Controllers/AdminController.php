<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminTop()
    {
        return view('admin.admin_top');
    }

    public function adminClass()
    {
        return view('admin.admin_class');
    }

    public function adminNews()
    {
        return view('admin.admin_news');
    }

    public function adminBanner()
    {
        return view('admin.admin_banner');
    }
}