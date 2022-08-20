<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $fillable = [
        'shop',
        'content',
        'img',
        'area_id',
        'genre_id'
    ];

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function reserves() {
        return $this->hasMany('App\Models\Reserve');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function evalution()
    {
      return $this->hasOne('App\Models\Evalution');
    }

      public function is_liked_by_auth_user()
  {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }
}
