<?php

namespace App\Filament\Widgets;

use App\Models\Borrowing;
use Filament\Widgets\ChartWidget;

class BorrowingsChartWidget extends ChartWidget
{
    protected ?string $heading = 'Borrowings Chart Widget';

    protected ?string $maxHeight = '200px';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        // $borrowings = Borrowing::query()
        //         ->selectRaw('DATE(borrowed_at) as borrowed_date, COUNT(*) as total')
        //         ->groupBy('borrowed_date')
        //         ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Borrowings',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    // 'data' => $borrowings->pluck('total'),
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected string $color = 'info';

    protected bool $isCollapsible = true;   
}
