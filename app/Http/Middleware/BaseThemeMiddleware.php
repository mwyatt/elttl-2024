<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class BaseThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Inertia::share('menuPrimary', $this->getMenuPrimary());
        Inertia::share('menuSecondary', [
            [
                'name' => 'Home',
                'url' => '/',
            ],
            [
                'name' => 'About',
                'url' => '/about',
            ],
            [
                'name' => 'Services',
                'url' => '/services',
            ],
            [
                'name' => 'Contact',
                'url' => '/contact',
            ],
        ]);

        return $next($request);
    }

    private function getMenuPrimary(): array
    {
        return [
            [
                'name' => 'The League',
                'url' => '#',
                'children' => [
                    [
                        'name' => 'Download Handbook',
                        'url' => '/asset/handbook-2024-2025.pdf'
                    ],
                    [
                        'name' => 'Download Fixtures',
                        'url' => '/asset/league-fixtures-2023-2024.xlsx'
                    ],
                    [
                        'name' => 'Rules',
                        'url' => '/asset/constitution-and-rules-2024-2025.pdf'
                    ],
                    [
                        'name' => 'Press Releases',
                        'url' => "urlGenerate('contentAll', ['type' => 'press'])"
                    ],
                    [
                        'name' => 'Competitions',
                        'url' => "urlGenerate('contentSingle', ['type' => 'page', 'slug' => 'competitions'])"
                    ],
                    [
                        'name' => 'Contact us',
                        'url' => "urlGenerate('contentSingle', ['type' => 'page', 'slug' => 'contact-us'])"
                    ]
                ]
            ],
            [
                'name' => 'Results',
                'url' => '#',
                'children' => [
                    [
                        'name' => 'Premier Division',
                        'url' => "urlGenerate('resultYearDivisionSingle', ['yearName' => , 'divisionName' => 'premier'])",
                        'children' => [
                            [
                                'name' => 'League Table',
                                'url' => "urlGenerate('resultYearDivisionLeague', ['yearName' => , 'divisionName' => 'premier'])"
                            ],
                            [
                                'name' => 'Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMerit', ['yearName' => , 'divisionName' => 'premier'])"
                            ],
                            [
                                'name' => 'Doubles Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMeritDoubles', ['yearName' => , 'divisionName' => 'premier'])"
                            ],
                        ]
                    ],
                    [
                        'name' => 'First Division',
                        'url' => "urlGenerate('resultYearDivisionSingle', ['yearName' => , 'divisionName' => 'first'])",
                        'children' => [
                            [
                                'name' => 'League Table',
                                'url' => "urlGenerate('resultYearDivisionLeague', ['yearName' => , 'divisionName' => 'first'])"
                            ],
                            [
                                'name' => 'Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMerit', ['yearName' => , 'divisionName' => 'first'])"
                            ],
                            [
                                'name' => 'Doubles Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMeritDoubles', ['yearName' => , 'divisionName' => 'first'])"
                            ],
                        ]
                    ],
                    [
                        'name' => 'Second Division',
                        'url' => "urlGenerate('resultYearDivisionSingle', ['yearName' => , 'divisionName' => 'second'])",
                        'children' => [
                            [
                                'name' => 'League Table',
                                'url' => "urlGenerate('resultYearDivisionLeague', ['yearName' => , 'divisionName' => 'second'])"
                            ],
                            [
                                'name' => 'Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMerit', ['yearName' => , 'divisionName' => 'second'])"
                            ],
                            [
                                'name' => 'Doubles Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMeritDoubles', ['yearName' => , 'divisionName' => 'second'])"
                            ],
                        ]
                    ],
                    [
                        'name' => 'Third Division',
                        'url' => "urlGenerate('resultYearDivisionSingle', ['yearName' => , 'divisionName' => 'third'])",
                        'children' => [
                            [
                                'name' => 'League Table',
                                'url' => "urlGenerate('resultYearDivisionLeague', ['yearName' => , 'divisionName' => 'third'])"
                            ],
                            [
                                'name' => 'Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMerit', ['yearName' => , 'divisionName' => 'third'])"
                            ],
                            [
                                'name' => 'Doubles Merit Table',
                                'url' => "urlGenerate('resultYearDivisionMeritDoubles', ['yearName' => , 'divisionName' => 'third'])"
                            ],
                        ]
                    ],
                ]
            ]
        ];
    }
}
