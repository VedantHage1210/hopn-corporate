<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * routes/admin.php registers a "logos" resource and the admin sidebar links to it,
 * but this controller did not exist, so the link ended in a 500 error and
 * `php artisan route:list` / `route:cache` failed. Logos are managed as Partners
 * (with the "verified" flag), so every logos route sends the editor there.
 */
class LogoController extends Controller
{
    public function index()   { return $this->toPartners(); }
    public function create()  { return redirect()->route('admin.partners.create'); }
    public function store()   { return $this->toPartners(); }
    public function show()    { return $this->toPartners(); }
    public function edit()    { return $this->toPartners(); }
    public function update()  { return $this->toPartners(); }
    public function destroy() { return $this->toPartners(); }

    private function toPartners()
    {
        return redirect()->route('admin.partners.index');
    }
}
