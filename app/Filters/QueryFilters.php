<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilters
{

    protected $request;

    protected $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $name => $value) {
            if (!method_exists($this, $name)) {
                continue;
            }
            if (strlen($value)) {
                $this->$name($value);
            } else {
                $this->$name();
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }

    public function sort($term = null)
    {
        $mode = $term[0] == '-' ? 'desc' : 'asc';
        $field = ($term[0] !== '+' && $term[0] !== '-') ? $term : substr($term,
            1);
        return $this->builder->orderBy($field, $mode);
    }
}
