<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $fillable = [
        'user_id',
        'shop_id',
        'evaluation',
        'comment'
    ];

    public function shops()
    {
        $this->belongTo('App\Models\Shop');
    }
}
