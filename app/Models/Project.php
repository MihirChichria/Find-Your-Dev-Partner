<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends BaseModel
{
    use HasFactory;

    public static function persistProject(array $data): Project
    {
        $project = null;
        DB::transaction(function () use ($data, &$project) {
            $project = Project::create($data);
        });
        return $project;
    }

    public function updateProject(array $data): Project
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
            $nameExtension.'title' => 'required',
            $nameExtension.'description' => 'required',
            $nameExtension.'end_date' => 'after_or_equal:start_date'
        ];
    }

    public static function getUpdateValidationRules(string $nameExtension = '', int $id = 0, bool $withChildRules = true): array
    {
        return [
            $nameExtension.'user_id' => 'required|exists:users,id',
            $nameExtension.'title' => 'required',
            $nameExtension.'description' => 'required',
            $nameExtension.'end_date' => 'after_or_equal:start_date'
        ];
    }
}
