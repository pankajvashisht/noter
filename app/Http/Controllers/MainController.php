<?php

namespace App\Http\Controllers;


use Illuminate\Database\Query\Builder;
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
//        $companies = $this->db2
//            ->select("
//                SELECT c.id, c.name, COUNT(o.id) as ocount
//                FROM companies c
//                    LEFT JOIN kpi_opportunities as o ON c.id = o.company_id
//                GROUP BY c.id, c.name
//                HAVING COUNT(c.id) > 1
//                ORDER BY id
//                    ");
        $companies = ($this->db2)->table('companies')
            ->from('companies')
            ->selectRaw('companies.id, companies.name, COUNT(kpi_opportunities.id) as ocount')
            ->leftJoin('kpi_opportunities', 'companies.id', '=', 'kpi_opportunities.company_id')
            ->groupBy('companies.id', 'companies.name')
            ->havingRaw('COUNT(companies.id) > 1')
            ->orderBy('companies.id')
            ->get()
            ->toArray();
        return Inertia::render('Dashboard/Companies', [
            'companies' => $companies
        ]);
    }
}
