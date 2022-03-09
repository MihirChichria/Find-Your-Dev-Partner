<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Match extends BaseModel
{
    use HasFactory;

    public static function persistMatch(array $data): Match
    {
        $match = null;
        DB::transaction(function () use ($data, &$match) {
            $match = Match::create($data);
        });
        return $match;
    }

    public function updateMatch(array $data): Match
    {
        DB::transaction(function () use ($data) {
            $this->update($data);
        });
        return $this;
    }

    public static function getCreateValidationRules(string $nameExtension = '', bool $withChildRules = true): array
    {
        return [
            $nameExtension.'developer_id_1' => 'required|exists:users,id',
            $nameExtension.'developer_id_2' => 'required|exists:users,id',
            $nameExtension.'project_id' => 'required|exists:projects,id'
        ];
    }

    public static function getUpdateValidationRules(string $nameExtension = '', int $id = 0, bool $withChildRules = true): array
    {
        return [
            $nameExtension.'developer_id_1' => 'required|exists:users,id',
            $nameExtension.'developer_id_2' => 'required|exists:users,id',
            $nameExtension.'project_id' => 'required|exists:projects,id'
        ];
    }
}
