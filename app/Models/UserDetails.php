<?php

namespace App\Models;

use App\Helpers\Constants\BaseConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends BaseModel
{
    use HasFactory;

    public static function getCreateValidationRules(string $nameExtension = '', bool $withChildRules = true): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'bio' => 'required',
            'gender' => 'required|in:'.BaseConstants::GENDER,
            'city' => 'required',
            'phone_number' => 'required'
        ];
    }

    public static function getUpdateValidationRules(string $nameExtension = '', int $id = 0, bool $withChildRules = true): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'bio' => 'required',
            'gender' => 'required|in:'.BaseConstants::GENDER,
            'city' => 'required',
            'phone_number' => 'required'
        ];
    }
}
