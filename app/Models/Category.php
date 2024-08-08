<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Tyre;

class Category extends Model
{
    use HasFactory;

    public function tyres()
    {
        return $this->hasMany(Tyre::class, 'category_id', 'id');
    }
}
