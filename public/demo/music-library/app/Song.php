<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model {
	
    protected $fillable = [
    	'title', 'album', 'music_director', 'lyrics', 'singer', 'release_year'
    ];


}
