<?php

namespace App\Http\Controllers;

use App\Models\Attendees;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AttendeesController extends Controller
{
     // Show all attendees
     public function index() {
        return view('attendees.index', [
            'attendees' => Attendees::paginate(6)
        ]);
    }

    // Show Create Form
    public function create() {
        return view('attendees.create');
    }

     // Store Attendees Data
     public function store(Request $request) {
       

        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('attendees', 'email')],
            'approved' => 'required'
        ]);
       
      
        Attendees::create($formFields);

        return redirect('/dashboard/attendees')->with('message', 'Attendees created successfully!');
    }

    // Show Edit Form
    public function edit(Attendees $attendee) {
        return view('attendees.edit', ['attendee' => $attendee]);
    }

    // Update Attendee Data
    public function update(Request $request, Attendees $attendee) {
        
        $formFields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'approved' => 'required'
        ]);


        $attendee->update($formFields);
        return redirect('/dashboard/attendees')->with('message', 'Attendees updated successfully!');
    }

    // Delete Attendee
    public function destroy(Attendees $attendee) {
       
        $attendee->delete();
        return redirect('/dashboard/attendees')->with('message', 'Attendees deleted successfully');
        
    }
}
