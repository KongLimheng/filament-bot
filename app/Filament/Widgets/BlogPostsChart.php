<?php

namespace App\Filament\Widgets;

use Filament\Widgets\PieChartWidget;

class BlogPostsChart extends PieChartWidget
{
    protected static ?string $heading = 'Chart';
    public ?string $filter = 'today';
    protected static ?int $sort = 2;

    protected function getColumns(): int | array
    {
        return 3;
    }

    protected function getData(): array
    {

        return [
            "datasets" => [
                [
                    "label" => 'My First Dataset',
                    "data" => [300, 50, 100],
                    "backgroundColor" => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    "hoverOffset" => 4
                ]
            ],
            "labels" => [
                'Red',
                'Blue',
                'Yellow'
            ]
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
