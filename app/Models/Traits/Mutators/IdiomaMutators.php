<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait IdiomaMutators {
    use Traslations;
    public function getTitleAttribute($value) {
        return $this->translation('title',$value);
    }
}
