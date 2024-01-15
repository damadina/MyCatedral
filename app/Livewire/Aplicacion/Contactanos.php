<?php

namespace App\Livewire\Aplicacion;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactanosMailable;

class Contactanos extends Component
{
    public $user;
    public $mensaje;
    public $url;

    public function mount() {
        $this->user = auth()->user();
        $this->url = session()->get('urlCallContactanos');
    }

    public function rules()
    {
        return [
            'mensaje' =>'required',
        ];
    }

    public function render()
    {
        session()->put('idiomas',false);
        if(session()->has('lang')) {
            app()->setLocale(session('lang'));
        } else {
            app()->setLocale(config('app.locale'));
        }
        return view('livewire.aplicacion.contactanos');
    }

    public function enviar() {
        $this->validate([
            'mensaje' => 'required',
        ],
        [
            'mensaje' => 'El mensaje no puede estar vacio',
        ]);

        Mail::to('catedraldesantiago.online@gmail.com')->send(new ContactanosMailable($this->user->name,$this->user->email,$this->mensaje));
        session()->flash('success', __('El mensaje ha sido enviado. Muchas gracias'));

        return back();
    }

}
