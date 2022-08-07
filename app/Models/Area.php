<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $fillable = [
        'area'
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
