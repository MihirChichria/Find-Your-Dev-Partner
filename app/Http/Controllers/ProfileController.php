<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\CreateProfileRequest;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Carbon\Carbon;
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
                    $education['user_id'] = $user->id;
                    $education['start_date'] = $education['start_date'] ? Carbon::parse($education['start_date'])->format('Y-m-d') : null;
                    $education['end_date'] = $education['end_date'] ? Carbon::parse($education['start_date'])->format('Y-m-d') : null;
                    Education::persistEducation($education);
                }
                foreach ($createProfileRequest->experience as $experience) {
                    $experience['user_id'] = $user->id;
                    $experience['start_date'] = $experience['start_date'] ? Carbon::parse($experience['start_date'])->format('Y-m-d') : null;
                    $experience['end_date'] = $experience['end_date'] ? Carbon::parse($experience['start_date'])->format('Y-m-d') : null;
                    Experience::persistExperience($experience);
                }
                if ($createProfileRequest->skills){
                    $user->skills()->attach($createProfileRequest->skills);
                }
            });
            session()->flash('success', 'Profile Updated Successfully');
            return redirect(route('dashboard'));
        } catch (Exception $e) {
            session()->flash('error', 'Cannot Update Profile');
            return redirect(route('dashboard'));
        }
    }
}
