<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Filterable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
