<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;

trait MemberScopes
{
    public function scopeSearch(Builder $query, ?string $args): Builder
    {
        if ($args) {
            return $query->where('name', 'like', "%{$args}%")
                    ->orWhere('broker', 'like', "%{$args}%")
                    ->orWhere('demat_acc_no', 'like', "%{$args}%");
        }
        return $query;
    }
    public function scopeLimitBy(Builder $query, int $start, int $length): Builder
    {
        if($length != -1)
        {
            return $query->offset($start)->limit($length);
        }
        return $query;
    }
    public function scopeOrder(Builder $query, array $order): Builder
    {
        if ($order) {
            $columns = ['id', 'name', 'broker', 'demat_acc_no'];
            return $query->orderBy($columns[$order[0]['column']], $order[0]['dir']);
        }
        return $query;
    }
}
