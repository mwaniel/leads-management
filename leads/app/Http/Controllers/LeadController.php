<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadJsonMail;
use App\Models\Salesperson;


class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
$salespersons = Salesperson::all(); // Fetch all salespersons

return view('leads.index', compact('leads', 'salespersons'));
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'createdate' => 'nullable|string',
            'how' => 'nullable|string',
            'type' => 'nullable|string',
            'mail_id' => 'nullable|string',
            'mail_date' => 'nullable|string',
            'mail_message' => 'nullable|string',
            'mail_subject' => 'nullable|string',
            'mail_json' => 'nullable|string',
        ]);

        Lead::create($validatedData);
        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }

    public function show(Lead $lead)
    {
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
{
    $salespersons = Salesperson::all(); // Retrieve all salespersons

    return view('leads.edit', compact('lead', 'salespersons'));
}

    public function update(Request $request, Lead $lead)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'createdate' => 'nullable|string',
            'how' => 'nullable|string',
            'type' => 'nullable|string',
            'mail_id' => 'nullable|string',
            'mail_date' => 'nullable|string',
            'mail_message' => 'nullable|string',
            'mail_subject' => 'nullable|string',
            'mail_json' => 'nullable|string',
            'status' => 'nullable|string|in:bad lead,lead for later,good lead',
            'note' => 'nullable|string',
            'sales_person_id' => 'nullable|exists:salespersons,id',
        ]);

        $lead->update($validatedData);

        // Check if lead is marked as "good" and send JSON
        if ($request->status == 'good') {
            $leadData = [
                'surname' => $lead->surname,
                'email' => $lead->email,
                'deal_created' => now()->format('d-m-Y'), // Assuming today's date
                'lead_type' => 'Soft',
                'sales_person_id' => $request->sales_person_id,
            ];

            // Send JSON via email
            Mail::to('coert@charlies-travels.com')->send(new LeadJsonMail($leadData));
        }

        return redirect()->route('leads.index')->with('success', 'Lead updated successfully.');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Lead deleted successfully.');
    }

public function updateStatus(Request $request, Lead $lead)
{
    $request->validate([
        'status' => 'required|in:good,bad,later',
        'note' => 'nullable|string',
    ]);

    $lead->status = $request->status;
    $lead->note = $request->note;
    $lead->save();

    // Send email if lead status is "good"
    if ($request->status === 'good') {
        $leadData = [
            'surname' => $lead->surname,
            'email' => $lead->email,
            'deal_created' => now()->format('d-m-Y'), // Change date format if needed
            'lead_type' => 'Soft',
            'sales_person_id' => $lead->sales_person_id,
        ];

        // Send JSON via email
        Mail::to('coert@charlies-travels.com')->send(new LeadJsonMail($leadData));
    }

    return redirect()->route('leads.index')->with('success', 'Lead status updated successfully.');
}
}
