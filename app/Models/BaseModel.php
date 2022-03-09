<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;

    public abstract static function getCreateValidationRules(string $nameExtension = '', bool $withChildRules=true) : array;
    public abstract static function getUpdateValidationRules(string $nameExtension = '', int $id=0, bool $withChildRules=true) : array;

}
