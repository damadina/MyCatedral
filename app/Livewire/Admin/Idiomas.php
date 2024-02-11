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
use Illuminate\Support\Facades\Storage;


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
        "capitulos" =>array('id','titulo','literal'),
        'categorias' =>array('id','title')
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
        $this->dispatch('show-formEdit');
    }
    public function close() {
        $this->resetValidation();
        $this->idiomaEdit->reset();
    }

    public function update() {
        $this->idiomaEdit->update();
        session()->flash('status','El idioma se ha actualizado');
        $this->dispatch('hide-formEdit');
    }
    public function traducir($idiomaID) {
        $this->dispatch('traducir',$idiomaID);
    }
    #[On('comenzarTraduccion')]
    public function borrarLocale($idiomaId) {
        $idioma = idioma::find($idiomaId);
        $this->traduceA($idioma);
    }

   /*  public function newIdioma() {
        $this->dispatch('show-form');
    } */

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
        $idioma->delete();


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
            case 'capitulos':
                $idioma->informacionsCapitulos = $currentDate;
                break;
            case 'categorias':
                $idioma->informacionsCapitulos = $currentDate;
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
        $translator = new \DeepL\Translator($authKey);
        $traduccion = $translator->translateText($texto, 'es', $deepLocale , ['tag_handling' => 'html'], );

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

    public function checkTraducciones($idiomaId) {
        $idioma = idioma::find($idiomaId);

        $total=0;
        foreach($this->tablas as $keytabla => $tabla) {
            $columnas = $this->tablas[$keytabla];
            $records = DB::table($keytabla)->select($columnas)->get();

            foreach($records as $record)
            {

                $id="";

                foreach($record as $columna => $value) {

                    switch($columna) {
                        case "id":
                            $id = $value;
                            break;
                        default:

                            $check = $this->checkIfExist($keytabla,$id,$columna,$idioma->locale);
                            if(!$check) {
                                $partial = strlen($value);

                                $line = $keytabla .'=> '.$id.'   '.$columna.' '.$idioma->locale.' '.$partial.PHP_EOL;
                                Storage::append('file.txt', $line);
                                $total = $total + $partial;

                            }

                    }

                }



            }

        }



        $this->dispatch('chekTraduccion',$idiomaId,$total);



    }


    public function checkIfExist($tabla,$id,$columna,$locale) {
        $translation = DB::table('translations')
        ->where('table',$tabla)
        ->where('column',$columna)
        ->where('row_id',$id)
        ->where('locale',$locale)->first();

        if($translation) {
            return true;
        } else {
            return false;
        }


    }
    #[On('comenzarcheck')]
    public function ejectCheck($idiomaId) {
        $idioma = idioma::find($idiomaId);
        $total=0;
        foreach($this->tablas as $keytabla => $tabla) {
            $columnas = $this->tablas[$keytabla];
            $records = DB::table($keytabla)->select($columnas)->get();

            foreach($records as $record)
            {

                $id="";
                foreach($record as $columna => $value) {

                    switch($columna) {
                        case "id":
                            $id = $value;
                            break;
                        default:

                            $check = $this->checkIfExist($keytabla,$id,$columna,$idioma->locale);
                            if(!$check) {

                                $this->translate($keytabla,$id,$value, $columna, $idioma->locale);
                            }

                    }

                }



            }

        }



    }


}
