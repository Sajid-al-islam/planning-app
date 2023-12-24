<?php

namespace App\Http\Controllers;

use App\Modules\Dofa\Model;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getPlans() {
        $dofas = Model::active()->with('department_plans')->get();
        return view('backend.plan.all', ['dofas' => $dofas]);
    }
}
