<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ConsultingBooking;

class ConsultingBookingController extends Controller
{
    public function index()
    {
        $items = ConsultingBooking::with(['expert', 'package'])->latest()->paginate(20);
        return view('admin.consulting-bookings.index', compact('items'));
    }
}
