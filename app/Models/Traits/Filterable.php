<?php


namespace App\Models\Traits;


use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
/**
* @param Builder $builder
* @param FilterInterface $filter
*
* @return Builder
*/
    public function scopeFilter(Builder $builder, FilterInterface $filter)  // имя для вызова данного метода - filter
    {                                                                       // (scope опускается)
        $filter->apply($builder);

        return $builder;
    }
}
