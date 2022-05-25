<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function search($value)
    {
        return $this->where(function ($q) use ($value) {
            return $q->where('first_name', 'LIKE', "%$value%")
            ->orWhere('last_name', 'LIKE', "%$value%")
            ->orWhere('email', 'LIKE', "%$value%");
        });
    }
}
