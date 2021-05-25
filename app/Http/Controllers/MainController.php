<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
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
            ->table('companies')
            ->limit(100)
            ->orderBy('id')
            ->get();
        return Inertia::render('Dashboard/Companies', [
            'companies' => $companies
        ]);
    }
}
