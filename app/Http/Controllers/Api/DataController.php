<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Vidio;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function profile(){
        $data = Profile::first();

        return ResponseHelper::success(
            message: 'Data profile berhasil diambil',
            status_code: 200,
            data: $data
        );
    }

    public function vidio(){
        $data = Vidio::first();

        return ResponseHelper::success(
            message: 'Data vidio berhasil diambil',
            status_code: 200,
            data: $data
        );
    }

    public function skills(){
        $data = Skill::get();

        return ResponseHelper::success(
            message: 'Data skills berhasil diambil',
            status_code: 200,
            data: $data
        );
    }

    public function experiences(){
        $data = Experience::get();

        return ResponseHelper::success(
            message: 'Data experiences berhasil diambil',
            status_code: 200,
            data: $data
        );
    }

    public function educations(){
        $data = Education::get();

        return ResponseHelper::success(
            message: 'Data educations berhasil diambil',
            status_code: 200,
            data: $data
        );
    }

    public function projects(){
        $data = Project::get();

        return ResponseHelper::success(
            message: 'Data projects berhasil diambil',
            status_code: 200,
            data: $data
        );
    }
}
