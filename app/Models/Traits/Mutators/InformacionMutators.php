<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait InformacionMutators {
    use Traslations;
    public function getTituloAttribute($value) {
        return $this->translation('titulo',$value);
    }
    public function getInformacionAttribute($value) {
        return $this->translation('informacion',$value);
    }
}
