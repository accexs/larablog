<?php

namespace App;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Filterable;

    protected $fillable = [
        'title', 'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
