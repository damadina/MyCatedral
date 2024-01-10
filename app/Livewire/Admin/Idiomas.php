<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\idioma;
use App\Livewire\Forms\IdiomaEditForm;
use Livewire\Attributes\On;
use App\Models\translation;
use App\Models\element;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Traits\generaHref;



class Idiomas extends Component
{
    use generaHref;
    public IdiomaEditForm $idiomaEdit;
    public $elementsTraduccion;

    public $isRed = false;

    public $tablas = array(
        "elements"=>array('id','title','resumen','seoTitle','seoMeta'),
        "textos"=>array('id','titulo','html'),
        "fotos"=>array('id','title','alt','piedefoto'),
        "idiomas"=>array('id','title'),
        "documents"=>array('id','titulo','html'),
        "autors" =>array('id','departamento','bio'),
        "informacions" =>array('id','titulo','informacion'),
    );


    #[On('idioma-creado')]
    public function render()
    {
        $idiomas = idioma::orderBy('orden')->get();
        return view('livewire.admin.idiomas',compact('idiomas'));
    }

    public function edit($idiomaId) {
        $this->resetValidation();
        $this->idiomaEdit->edit($idiomaId);
    }
    public function update() {
        $this->idiomaEdit->update();
    }
    public function traducir($idiomaID) {
        $this->dispatch('traducir',$idiomaID);
    }
    #[On('comenzarTraduccion')]
    public function borrarLocale($idiomaId) {
        $idioma = idioma::find($idiomaId);
        $this->traduceA($idioma);
    }

    public function limpiar($idiomaID) {
        $this->dispatch('limpiar',$idiomaID);
    }
    #[On('comenzarlimpieza')]
    public function comenzarlimpieza($idiomaID) {
        $idioma = idioma::find($idiomaID);
        foreach($idioma->traducciones_Start as $key =>$tabla) {
            translation::where([['locale','=',$idioma->locale],
            ['table','=',$tabla],
            ['traductor','=','API']
            ])->delete();

            $this->updateDate($tabla,$idioma,"");

        }


    }


    public function GeneraHrflangs() {
        $this->generaHrefLang();


    }
    #[On('borrarAllLocale')]
    public function borraAllLocale() {
        dd("jjjjj");
    }


    public function traduceA(idioma $idioma) {
        $currentDate = date('d-m-Y');
        $locale = $idioma->locale;
        foreach($idioma->traducciones_Start as $key => $tabla) {

            translation::where([['locale','=',$locale],
            ['table','=',$tabla],
            ['traductor','=','API']
            ])->delete();

            $campos = $this->tablas[$tabla];
            $records = DB::table($tabla)->select($campos)->get();


            foreach($records as $record) {
                foreach ($record as $fieldKey => $value) {
                    if($fieldKey == "id") {continue;};
                    $valor = $value;
                   /*  if($fieldKey == "slug") {$valor == $record->title;} */
                    $this->translate($tabla,$record->id,$valor, $fieldKey, $locale);
                }
            }


            $this->updateDate($tabla,$idioma,$currentDate);




        }


    }

    function updateDate($tabla,$idioma,$currentDate) {

        switch($tabla) {
            case 'elements':
                $idioma->elementsTraduccion = $currentDate;
                break;
            case 'textos':
                $idioma->textosTraduccion = $currentDate;
                break;
            case  'fotos':
                $idioma->fotosTraduccion = $currentDate;
                break;
            case  'idiomas':
                $idioma->idiomasTraduccion = $currentDate;
                break;
            case  'documents':
                $idioma->documentsTraduccion = $currentDate;
                break;
            case   'autors':
                $idioma->autorsTraduccion = $currentDate;
                break;
            case 'informacions':
                $idioma->informacionsTraduccion = $currentDate;
                break;
        }
        $idioma->save();
    }



    function translate($tabla,$id,$texto, $column, $locale) {

        if($locale == "en") {
            $deepLocale = "en-US";
        } else {
            $deepLocale = $locale;
        }

        $authKey = env('DEEPL_KEY');

        /* dd($authKey); */
        /* $authKey = "89786711-b707-a136-0673-8cc3b8839123"; */
        $translator = new \DeepL\Translator($authKey);



        /* if($column=="slug") {
            $textoDeepl = str_replace("-",' ',$texto);
        } else {
            $textoDeepl = $texto;
        } */

        $traduccion = $translator->translateText($texto, 'es', $deepLocale , ['tag_handling' => 'html'], );

        /* if($column=="slug") {
            $traduccion = str_replace(" ","-",$traduccion);
        }
 */

        translation::create([
            'table' => $tabla,
            'column' => $column,
            'row_id' => $id,
            'locale' => $locale,
            'translation' => $traduccion,
            'traductor' => 'API',
        ]);

        if($column == "title" and $tabla=="elements") {

            $slug = Str::slug($traduccion);
            if($id == 45) {
                $slug ="";
            }

            translation::create([
                'table' => $tabla,
                'column' => 'slug',
                'row_id' => $id,
                'locale' => $locale,
                'translation' => $slug,
                'traductor' => 'API',
            ]);
        }





    }





}
