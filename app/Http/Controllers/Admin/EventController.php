<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() { return view('admin.events.index'); }
    public function create() { return view('admin.events.create'); }
    public function store(Request $request) { return redirect()->route('admin.events.index'); }
    public function show($id) { return view('admin.events.show'); }
    public function edit($id) { return view('admin.events.edit'); }
    public function update(Request $request, $id) { return redirect()->route('admin.events.index'); }
    public function destroy($id) { return redirect()->route('admin.events.index'); }
}
