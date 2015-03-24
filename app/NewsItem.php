<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model {

	protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'intro', 'permalink', 'date'];

    public function feed()
    {
        return $this->belongsTo('App\Feed');
    }


}
