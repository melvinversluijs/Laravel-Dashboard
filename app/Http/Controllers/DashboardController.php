<?php

namespace App\Http\Controllers;

/**
 * Dashboard controller.
 */
class DashboardController extends Controller
{
    /**
     * Show dashboard.
     *
     * @return void
     */
    public function index()
    {
        return \view('dashboard.index');
    }
}
