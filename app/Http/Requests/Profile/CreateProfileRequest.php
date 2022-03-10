<?php

namespace App\Http\Requests\Profile;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\UserDetails;
use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        dd($this->request);
        return array_merge(UserDetails::getCreateValidationRules(),
            Education::getCreateValidationRules('education.*.'),
            Experience::getCreateValidationRules('experience.*.'),
            Project::getCreateValidationRules('project.*.'),
            Skill::getCreateValidationRules('skills.*.')
        );
    }
}
