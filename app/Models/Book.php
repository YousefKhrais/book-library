<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo("App\Models\Author");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\Category");
    }

    public function publisher()
    {
        return $this->belongsTo("App\Models\Publisher");
    }
}
