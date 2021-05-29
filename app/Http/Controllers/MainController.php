<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{

    private array $companies;

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
        $this->setCompanyOpportunityCount()
            ->makeIdsKeys()
            ->setOpportunityHistoryCount()
            ->setPersonaCount()
            ->makeInitials();
        return Inertia::render('Dashboard/Companies', [
            'companies' => $this->companies
        ]);
    }

    private function setCompanyOpportunityCount(): self
    {
        $this->companies = $this->db2
            ->select("
                SELECT c.id, c.name, COUNT(o.id) as opps, max(o.created_date) as latest_opp_date
                FROM companies c
                    LEFT JOIN kpi_opportunities as o ON c.id = o.company_id
                GROUP BY c.id, c.name
                HAVING COUNT(c.id) > 1
                ORDER BY latest_opp_date DESC
                    ");
        return $this;
    }

    private function setOpportunityHistoryCount(): self
    {
        $company_ids = implode(',', array_keys($this->companies));
        $company_history_count = $this->db2->select("
            SELECT COUNT(*) as history_count, o.company_id, max(h.created_date) as latest_history_date
            FROM kpi_opportunity_histories h
            LEFT JOIN kpi_opportunities o ON o.id = h.opportunity_id
            WHERE o.company_id IN ($company_ids)
            GROUP BY o.company_id
        ");
        array_map(function ($history_count) {
            if(isset($this->companies[$history_count->company_id])) {
                $this->companies[$history_count->company_id]->history_count = $history_count->history_count;
                $this->companies[$history_count->company_id]->latest_history_date = date("M d, Y", strtotime($history_count->latest_history_date));
            }
        }, $company_history_count);
        return $this;
    }

    private function makeIdsKeys(): self
    {
        $companies = [];
        foreach ($this->companies as $company) {
            $companies[$company->id] = $company;
        }
        $this->companies = $companies;
        return $this;
    }

    private function setPersonaCount(): self
    {
        $personas = $this->db2
            ->select("
                SELECT c.id, c.name, COUNT(p.id) as personas
                FROM kpi_personas p
                    LEFT JOIN companies as c ON p.company_id = c.id
                GROUP BY c.id, c.name
                HAVING COUNT(c.id) > 0
                    ");
        array_map(function ($persona) {
            if(isset($this->companies[$persona->id])) {
                $this->companies[$persona->id]->personas = $persona->personas;
            }
        }, $personas);
        return $this;
    }

    private function makeInitials(): void
    {
        array_map(function ($company) {
            $word_count = explode(' ', $company->name);
            $initials = substr($word_count[0], 0, 1);
            if(count($word_count) > 1) {
                $initials = substr($word_count[0], 0, 1) . substr($word_count[1], 0, 1);
            }
            $company->initials = strtoupper($initials);
            $company->latest_opp_date = date("M d, Y", strtotime($company->latest_opp_date));
            return $company;
        }, $this->companies);
    }
}
