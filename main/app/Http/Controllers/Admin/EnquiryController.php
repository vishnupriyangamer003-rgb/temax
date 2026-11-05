<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Enquiry::latest();

        if ($status && array_key_exists($status, Enquiry::STATUSES)) {
            $query->where('status', $status);
        }

        return view('admin.enquiries.index', [
            'enquiries' => $query->paginate(20)->withQueryString(),
            'status'    => $status,
            'counts'    => Enquiry::select('status', \DB::raw('COUNT(*) as total'))->groupBy('status')->pluck('total', 'status'),
        ]);
    }

    public function show(Enquiry $enquiry)
    {
        if ($enquiry->status === 'new') {
            $enquiry->update(['status' => 'read']);
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function updateStatus(Request $request, Enquiry $enquiry)
    {
        $request->validate([
            'status' => 'required|string|in:' . implode(',', array_keys(Enquiry::STATUSES)),
        ]);

        $enquiry->update(['status' => $request->input('status')]);

        return back()->with('success', 'Enquiry status updated.');
    }

    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry deleted.');
    }
}
