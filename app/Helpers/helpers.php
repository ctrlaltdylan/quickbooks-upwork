<?php
namespace App\Helpers;

use App\Models\User;
use App\Models\Audit;
use App\Models\Leadsource;
use Carbon\Carbon;
use Auth;

class helpers
{

    public function leadtype()
    {
        return [
            "Residential" => "Residential",
            "Commercial" => "Commercial",
            "HOA" => "HOA",
            "Public Works" => "Public Works",
            "Painting" => "Painting",
        ];
    }

    public function status()
    {
        return [
            "New" => "New",
            "Cold_Lead" => "Cold Lead",
            "Follow_Up" => "Follow Up",
            "post_est_follow_up" => "Post Est. Follow Up",
            "scheduled_for_estimate" => "scheduled for estimate",
            "Estimate_in_progress" => "Estimate in progress",
            "Estimate_provided" => "Estimate provided",
            "provided_to_production" => "Provided to Production",
            "waiting_for_client" => "waiting for client",
            "in_production" => "In Production",
            "contract_signed" => "contract signed",
            "work_started" => "Work Started",
            "closed_not_sold" => "Closed – Not Sold",
            "closed_cancelled" => "Closed - Cancelled",
            "closed_work_completed" => "Closed - work completed"
        ];

    }

    public function sections()
    {
        return [
            "all" => " All ",
            "User" => "Users",
            "User Role" => "User Role",
            "Client" => "Clients",
            "Email Template" => "Emails Template",
            "Lead Source" => "Lead Source",
            "Production Email" => "Production Email"
        ];
    }

    public function estimators()
    {
        $data = [];
        $users = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'Estimator');
            }
        )->get();
        foreach ($users as $user) {
            $data[$user->id] = $user->first_name . " " . $user->last_name;
        }

        return $data;
    }

    public function leadsource()
    {
        $ls = Leadsource::pluck('title', 'title');

        return $ls;
    }

    public function saveAudit($data)
    {
        $user = \Auth::user();
        $audit = new Audit;
        $audit->page = $data['page'];
        $audit->action = $data['action'];
        $audit->user_id = $user->id;
        $audit->save();
    }

}