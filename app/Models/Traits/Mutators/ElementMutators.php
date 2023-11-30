<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait ElementMutators {
    use Traslations;
    public function getTitleAttribute($value) {
        return $this->translation('title',$value);
    }
    /* public function getSlugAttribute($value) {
        return $this->translation('slug',$value);
    } */
    public function getResumenAttribute($value) {
        return $this->translation('resumen',$value);
    }
    public function getSeoTitleAttribute($value) {
        return $this->translation('seoTitle',$value);
    }
    public function getSeoMetaAttribute($value) {
        return $this->translation('seoMeta',$value);
    }


}
