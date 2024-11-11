<?php

namespace App\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();

        return view('pages.experiences.edit', compact('experiences'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'experiences.*.title' => 'required',
            'experiences.*.company' => 'required',
            'experiences.*.position' => 'required',
            'experiences.*.start_date' => 'required|date',
            'experiences.*.end_date' => 'nullable|date|after_or_equal:experiences.*.start_date',
        ]);

        // Hapus semua data lama sebelum update
        Experience::truncate();

        // Simpan data yang baru
        foreach ($request->experiences as $exp) {
            Experience::create([
                'title' => $exp['title'],
                'company' => $exp['company'],
                'position' => $exp['position'],
                'start_date' => $exp['start_date'],
                'end_date' => $exp['end_date'] ?? null,
            ]);
        }

        return redirect()->back()->with('success', 'Experiences updated successfully');
    }
}
