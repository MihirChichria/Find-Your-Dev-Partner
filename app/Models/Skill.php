<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Skill extends BaseModel
{
    use HasFactory;

    public static function persistSkill(array $data): Skill
    {
        $skill = null;
        DB::transaction(function () use ($data, &$skill) {
            $skill = Skill::create($data);
        });
        return $skill;
    }

    public function updateReview(array $data): Skill
    {
        DB::transaction(function () use ($data) {
            $this->update($data);
        });
        return $this;
    }

    public static function getCreateValidationRules(string $nameExtension = '', bool $withChildRules = true): array
    {
        return [
            'name' => 'required|unique:skills'
        ];
    }

    public static function getUpdateValidationRules(string $nameExtension = '', int $id = 0, bool $withChildRules = true): array
    {
        return [
            'name' => 'required|unique:skills,'.$id
        ];
    }
}
