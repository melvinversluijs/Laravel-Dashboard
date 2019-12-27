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
        return \view('dashboard.index', [
            'widgets'     => [
                [
                    'id'      => 'clock',
                    'start-x' => 7,
                    'end-x'   => 9,
                    'start-y' => 1,
                    'end-y'   => 1,
                ],
            ],
            'fixedHeader' => true,
        ]);
    }
}
