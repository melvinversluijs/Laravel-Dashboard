<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;
use function view;

/**
 * Dashboard controller.
 */
class DashboardController extends Controller
{
    public function index(): View
    {
        $widgets = $this->getWidgets();

        return view('dashboard.index', compact('widgets'));
    }

    private function getWidgets(): array
    {
        return [
            [
                'id' => Str::uuid(),
                'component' => 'clock',
                'start-x' => 7,
                'end-x' => 9,
                'start-y' => 1,
                'end-y' => 1,
            ],
        ];
    }
}
