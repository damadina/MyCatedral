<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait FotoMutators {
    use Traslations;
    public function getTitleAttribute($value) {
        return $this->translation('title',$value);
    }
    public function getPiedefotoAttribute($value) {
        return $this->translation('piedefoto',$value);
    }
    public function getAltAttribute($value) {
        return $this->translation('alt',$value);
    }


}
