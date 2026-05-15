<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Investor;

class InvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::latest()->get();
        return view('public.investors.index', compact('investors'));
    }
}
