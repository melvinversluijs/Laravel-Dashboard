<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

use function view;

class DashboardController extends Controller
{
    public function index(): View
    {
        $widgets = $this->getWidgets();

        return view('dashboard.index', compact('widgets'));
    }

    /**
     * @return array<array<string,string>>
     */
    private function getWidgets(): array
    {
        return [
            [
                'id' => Str::uuid()->toString(),
                'component' => 'clock',
                'start-x' => '7',
                'end-x' => '9',
                'start-y' => '1',
                'end-y' => '1',
            ],
        ];
    }
}
