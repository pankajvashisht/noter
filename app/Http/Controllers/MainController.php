<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function index(): Response
    {
        $companies = [
            [
                'id' => 1,
                'name' => 'Aye'
            ],
            [
                'id' => 2,
                'name' => 'Bee'
            ],
        ];
        return Inertia::render('Dashboard/Main', [
            'companies' => $companies
        ]);
    }

    public function companies(): Response
    {
        $companies = $this->db2
            ->select("
                SELECT c.id, c.name, COUNT(o.id) as ocount
                FROM companies c
                    LEFT JOIN kpi_opportunities as o ON c.id = o.company_id
                GROUP BY c.id, c.name
                HAVING COUNT(c.id) > 1
                ORDER BY id
                    ");
        return Inertia::render('Dashboard/Companies', [
            'companies' => $companies
        ]);
    }
}
