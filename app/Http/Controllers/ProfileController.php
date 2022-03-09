<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\CreateProfileRequest;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.profile');
    }

    public function store(CreateProfileRequest $createProfileRequest)
    {
        try {
            DB::transaction(function () use ($createProfileRequest) {
                $user = auth()->user();
                $user->bio = $createProfileRequest->bio;
                $user->gender = $createProfileRequest->gender;
                $user->city = $createProfileRequest->city;
                $user->stackoverflow_id = $createProfileRequest->stackoverflow_id;
                $user->github_id = $createProfileRequest->github_id;
                $user->linked_in = $createProfileRequest->linked_in;
                $user->phone_number = $createProfileRequest->phone_number;
                foreach ($createProfileRequest->education as $education) {
                    Education::persistEducation($education);
                }
                foreach ($createProfileRequest->experience as $experience) {
                    Experience::persistExperience($experience);
                }
                foreach ($createProfileRequest->project as $project) {
                    Project::persistProject($project);
                }
                foreach ($createProfileRequest->skills as $skill) {
                    Skill::persistSkill($skill);
                }
            });
        } catch (Exception $e) {
            dd($e);
        }
    }
}
