<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model {

	protected $table = "favorite";
	protected $fillable = [
							"user_id",
							"name",
							"link"
							];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

}