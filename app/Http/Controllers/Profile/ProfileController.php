<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\StoreHelper;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $data = Profile::first();

        return view('pages.profile.edit', compact('data'));
    }

    public function update(Request $request){
        $data = Profile::first();

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'biodata' => 'required',
            'link_to_github' => 'required',
            'link_to_linkedin' => 'required',
            'photo' => 'nullable',
            'cv' => 'nullable',
        ]);

        if ($data){
            $data->update([
                'name' => $request->name,
                'title' => $request->title,
                'email' => $request->email,
                'phone' => $request->phone,
                'biodata' => $request->biodata,
                'link_to_github' => $request->link_to_github,
                'link_to_linkedin' => $request->link_to_linkedin,
                'photo' => $request->photo ? StoreHelper::store($request->file('photo'), 'photo') : $data->photo,
                'cv' => $request->cv ? StoreHelper::store($request->file('cv'), 'cv') : $data->cv,
            ]);
        } else {
            Profile::create([
                'name' => $request->name,
                'title' => $request->title,
                'email' => $request->email,
                'phone' => $request->phone,
                'biodata' => $request->biodata,
                'link_to_github' => $request->link_to_github,
                'link_to_linkedin' => $request->link_to_linkedin,
                'photo' => $request->photo ? StoreHelper::store($request->file('photo'), 'photo') : null,
                'cv' => $request->cv ? StoreHelper::store($request->file('cv'), 'cv') : null,
            ]);
        }


        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
