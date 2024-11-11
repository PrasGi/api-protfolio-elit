<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all(); // Mendapatkan semua data skill

        return view('pages.skill.edit', compact('skills'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'skills.*.name' => 'required|string|max:255',
            'skills.*.point' => 'required|string',
        ]);

        // Ambil semua ID skill yang diterima dari form
        $submittedIds = collect($request->input('skills'))->pluck('id')->filter()->all();

        // Hapus skill yang tidak ada dalam daftar ID yang diterima
        Skill::whereNotIn('id', $submittedIds)->delete();

        foreach ($request->input('skills') as $skillData) {
            if (isset($skillData['id']) && $skillData['id']) {
                // Jika skill memiliki ID, update data skill yang ada
                $skill = Skill::find($skillData['id']);
                if ($skill) {
                    $skill->update([
                        'name' => $skillData['name'],
                        'point' => $skillData['point'],
                    ]);
                }
            } else {
                // Jika skill tidak memiliki ID, buat skill baru
                Skill::create([
                    'name' => $skillData['name'],
                    'point' => $skillData['point'],
                ]);
            }
        }

        return redirect()->back()->with('success', 'Skills updated successfully');
    }
}
