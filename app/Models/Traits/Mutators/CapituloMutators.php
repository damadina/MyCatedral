<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait CapituloMutators {
    use Traslations;
    public function getTituloAttribute($value) {
        return $this->translation('titulo',$value);
    }
    public function getLiteralAttribute($value) {
        return $this->translation('literal',$value);
    }


}
