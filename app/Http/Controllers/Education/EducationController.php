<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();

        return view('pages.education.edit', compact('educations'));
    }

    // Update or add new education entries
    public function update(Request $request)
    {
        $request->validate([
            'educations.*.title' => 'required|string|max:255',
            'educations.*.start_date' => 'required|date',
            'educations.*.end_date' => 'nullable|date',
        ]);

        // Truncate the table to clear all previous data before inserting new data
        Education::truncate();

        // Loop through the submitted education data and save each entry
        foreach ($request->educations as $educationData) {
            Education::create($educationData);
        }

        return redirect()->route('education.index')->with('success', 'Education records updated successfully.');
    }
}
