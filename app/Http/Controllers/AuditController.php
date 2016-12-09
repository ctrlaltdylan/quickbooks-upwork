<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Helpers\helpers;

/**
 * Class AuditController
 *
 * @package App\Http\Controllers
 */
class AuditController extends Controller
{

    public function __construct()
    {
        $this->helpers = new helpers;
    }

    /**
     * List Audit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $req = $request->all();
        $qry = Audit::orderBy('id', 'desc');//->paginate(5);

        if ($request->section != "all") {
            $qry->where('page', $request->section);
        }

        $audits = $qry->paginate(50);

        $sections = $this->helpers->sections();

        return view('audit.index', compact(['audits', 'req', 'sections']));
    }


}