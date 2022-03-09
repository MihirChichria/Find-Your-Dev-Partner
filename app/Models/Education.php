<?php

namespace App\Models;

use App\Helpers\Constants\BaseConstants;
use App\Helpers\Services\Utils;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Education extends BaseModel
{
    use HasFactory;
    protected $table="educations";

    public static function persistEducation(array $data): Education
    {
        $education = null;
        DB::transaction(function () use ($data, &$education) {
            $education = Education::create($data);
        });
        return $education;
    }

    public function updateEducation(array $data): Education
    {
        DB::transaction(function () use ($data) {
            $this->update($data);
        });
        return $this;
    }

    public static function getCreateValidationRules(string $nameExtension = '', bool $withChildRules = true): array
    {
        return [
            $nameExtension.'degree_type' => 'required|in:'.implode(',',array_values(BaseConstants::DEGREE_TYPE)),
            $nameExtension.'average_percentage' => 'required',
            $nameExtension.'institute_name' => 'required',
            $nameExtension.'field_study' => 'required',
            $nameExtension.'start_date' => 'required',
            $nameExtension.'end_date' => 'required|after_or_equal:start_date'
        ];
    }

    public static function getUpdateValidationRules(string $nameExtension = '', int $id = 0, bool $withChildRules = true): array
    {
        return [
            $nameExtension.'degree_type' => 'required|in:'.implode(',',array_values(BaseConstants::DEGREE_TYPE)),
            $nameExtension.'average_percentage' => 'required',
            $nameExtension.'institute_name' => 'required',
            $nameExtension.'field_study' => 'required',
            $nameExtension.'start_date' => 'required',
            $nameExtension.'end_date' => 'after_or_equal:start_date'
        ];
    }
}
