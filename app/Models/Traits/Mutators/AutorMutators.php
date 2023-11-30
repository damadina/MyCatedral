<?php
namespace App\Models\Traits\Mutators;
use App\Traits\Traslations;

trait AutorMutators {
    use Traslations;
    public function getNameAttribute($value) {
        return $this->translation('name',$value);
    }
    public function getBioAttribute($value) {
        return $this->translation('bio',$value);
    }
    public function getDepartamentoAttribute($value) {
        return $this->translation('departamento',$value);
    }

}
