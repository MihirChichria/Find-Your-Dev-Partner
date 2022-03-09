<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Experience extends BaseModel
{
    use HasFactory;

    public static function persistExperience(array $data): Experience
    {
        $experience = null;
        DB::transaction(function () use ($data, &$experience) {
            $experience = Experience::create($data);
        });
        return $experience;
    }

    public function updateExperience(array $data): Experience
    {
        DB::transaction(function () use ($data) {
            $this->update($data);
        });
        return $this;
    }

    public static function getCreateValidationRules(string $nameExtension = '', bool $withChildRules = true): array
    {
        return [
            $nameExtension.'user_id' => 'required|exists:users,id',
            $nameExtension.'company_name' => 'required',
            $nameExtension.'job_role' => 'required',
            $nameExtension.'job_description' => 'required',
            $nameExtension.'start_date' => 'required',
            $nameExtension.'end_date' => 'after_or_equal:start_date',
        ];
    }

    public static function getUpdateValidationRules(string $nameExtension = '', int $id = 0, bool $withChildRules = true): array
    {
        return [
            $nameExtension.'user_id' => 'required|exists:users,id',
            $nameExtension.'company_name' => 'required',
            $nameExtension.'job_role' => 'required',
            $nameExtension.'job_description' => 'required',
            $nameExtension.'start_date' => 'required',
            $nameExtension.'end_date' => 'after_or_equal:start_date',
        ];
    }
}
