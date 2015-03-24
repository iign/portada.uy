<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Feed;

class FeedTableSeeder extends Seeder {

    public function run()
    {
        DB::table('feeds')->delete();

        Feed::create(array(
            'id'          => 1,
            'title'       => 'La República',
            'description' => 'La República',
            'website'     => 'http://www.republica.com.uy/',
            'feed_url'    => 'http://www.republica.com.uy/feed'
        ));

        Feed::create(array(
            'id'          => 2,
            'title'       => 'UYPress',
            'description' => 'Agencia uruguaya de noticias',
            'website'     => 'http://www.uypress.net',
            'feed_url'    => 'http://www.uypress.net/anxml.aspx?13',
        ));
    }

}
