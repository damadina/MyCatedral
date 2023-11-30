<?php

namespace App\Livewire\Forms;

use App\Models\element;
use Livewire\Attributes\Rule;
use Livewire\Form;
use App\Models\foto;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FotoCreateForm extends Form
{
    public $image;
    public $order;
    public $url;
    public $piedefoto;
    public $keywords;
    public $alt;
    public $title;
    public $element_id = "";

    public function rules()
    {
        return [
            'image' =>'required',
            'url' => 'required|unique:fotos,url',
            'piedefoto' => 'required|min:10',
            'keywords' => 'required|min:5',
            'alt' => 'required|min:20|max:125',
            'title' => 'required|min:6',
            'element_id' => 'required',
            'order' => 'required'
        ];
    }





    public function save() {
        $this->validate();
        $elemento = element::find($this->element_id);
        $name = $elemento->slug.'-'.$this->image->getClientOriginalName();
        $this->url = $name;




        /* list($width, $height) = getimagesize($this->fotoCreate->url->temporaryUrl()); */


        $this->storeImage($name);


        foto::create(
            $this->only('url','piedefoto','keywords','alt','title','element_id','order')
        );
        $this->reset();
    }

    public function storeImage($name) {
        list($width, $height) = getimagesize($this->image->temporaryUrl());
        $extension = $this->image->getClientOriginalExtension();

        $image = Image::make($this->image)->encode($extension,70);
        Storage::put('public/originales/'.$name, $image);
        $image = Image::make($this->image)->resize($width/5,$height/5)->encode($extension,70);
        Storage::put('public/miniaturas/'.$name, $image);
    }





}
