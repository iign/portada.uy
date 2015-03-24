<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model {

	protected $table = 'feeds';

    public function news()
    {
        return $this->hasMany('App\NewsItem');
    }

}
