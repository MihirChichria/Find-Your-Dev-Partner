<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends BaseModel
{
    use HasFactory;

    public static function persistReview(array $data): Review
    {
        $review = null;
        DB::transaction(function () use ($data, &$review) {
            $review = Review::create($data);
        });
        return $review;
    }

    public function updateReview(array $data): Review
    {
        DB::transaction(function () use ($data) {
            $this->update($data);
        });
        return $this;
    }

    public static function getCreateValidationRules(string $nameExtension = '', bool $withChildRules = true): array
    {
        // TODO: Implement getCreateValidationRules() method.
    }

    public static function getUpdateValidationRules(string $nameExtension = '', int $id = 0, bool $withChildRules = true): array
    {
        // TODO: Implement getUpdateValidationRules() method.
    }
}
