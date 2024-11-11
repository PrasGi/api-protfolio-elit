<?php

namespace App\Http\Controllers\Project;

use App\Helpers\StoreHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('pages.projects.edit', compact('projects'));
    }

    // Update or add new projects
    public function update(Request $request)
    {
        $request->validate([
            'projects.*.title' => 'required|string|max:255',
            'projects.*.description' => 'nullable|string',
            'projects.*.photo' => 'nullable|file|image|max:2048', // Validasi foto, jika ada
            'projects.*.url' => 'required|string',
        ]);

        // Truncate the table to clear all previous data before inserting new data
        Project::truncate();

        // Loop through the submitted project data and save each entry
        foreach ($request->projects as $key => $projectData) {
            // Check if a photo was uploaded
            if (isset($projectData['photo'])) {
                $photoPath = StoreHelper::store($request->file('projects.' . $key . '.photo'), 'project');
                $projectData['photo'] = $photoPath;  // Simpan URL path foto
            }

            // Create or update project data
            Project::create($projectData);
        }

        return redirect()->route('project.index')->with('success', 'Projects updated successfully.');
    }
}
