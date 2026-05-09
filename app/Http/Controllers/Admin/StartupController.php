<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StartupController extends Controller
{
    public function index() { return view('admin.startups.index'); }
    public function create() { return view('admin.startups.create'); }
    public function store(Request $request) { return redirect()->route('admin.startups.index'); }
    public function show($id) { return view('admin.startups.show'); }
    public function edit($id) { return view('admin.startups.edit'); }
    public function update(Request $request, $id) { return redirect()->route('admin.startups.index'); }
    public function destroy($id) { return redirect()->route('admin.startups.index'); }
}
