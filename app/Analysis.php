<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model {

	protected $table = "analysis";
	protected $fillable = [
							"url",
							"r_manquante_arr",
							"r_links",
							"nb_r_broken",
							"urls",
							"tmoyen",
							"prof",
							"tdep",
							"loading_time",
							"load_time",
							"broken_link",
							"syntaxe_errors",
							"internal_links",
							"external_links",
							"nb_broken",
							"nb_broken404",
							"analyse_synt",
							"op_images",
							"user_id"
							];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public static function getAnalysisById($name)
    {
        $analysis = Analysis::find($name)->toArray();
        foreach ($analysis as $key => $value) {
            if ($key != "created_at" && $key != "updated_at") {
                $analysis[$key] = json_decode($value, true);
            }
        }

        return $analysis;
    }

}