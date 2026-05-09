<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index() { return view('admin.investors.index'); }
    public function create() { return view('admin.investors.create'); }
    public function store(Request $request) { return redirect()->route('admin.investors.index'); }
    public function show($id) { return view('admin.investors.show'); }
    public function edit($id) { return view('admin.investors.edit'); }
    public function update(Request $request, $id) { return redirect()->route('admin.investors.index'); }
    public function destroy($id) { return redirect()->route('admin.investors.index'); }
}
