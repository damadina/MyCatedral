<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait DocumentMutators {
    use Traslations;
    public function getTituloAttribute($value) {
        return $this->translation('titulo',$value);
    }
    /* public function getSlugAttribute($value) {
        return $this->translation('slug',$value);
    } */
    public function getHtmlAttribute($value) {
        return $this->translation('html',$value);
    }

}
