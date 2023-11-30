<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait TextoMutators {
    use Traslations;
    public function getTituloAttribute($value) {
        return $this->translation('titulo',$value);
    }
    public function getHtmlAttribute($value) {
        return $this->translation('html',$value);
    }
}
