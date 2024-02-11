<?php
namespace App\Traits;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\translation;
use App\Models\foto;
use App\Traits\TrataTexto;

trait Traslations {
    use TrataTexto;
    public function translation($column, $default = '') {

        $locale = App::getLocale();

        if($locale == "es") {
            return $default;
        }

        $translation = DB::table('translations')
            ->where('table',$this->table)
            ->where('column',$column)
            ->where('row_id',$this->id)
            ->where('locale',$locale)->first();


        if($translation) {
            $textoFinal = $this->convierte($translation->translation);
            return $textoFinal;
        } else {
            return $default;
        }


    }

}


