<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait CategoriaMutators {
    use Traslations;
    public function getTitleAttribute($value) {
        return $this->translation('title',$value);
    }
}
