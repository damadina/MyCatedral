<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Salmanbe\Deepl\Deepl;

class pruebaController extends Controller
{
    public function index() {

        $deepl = new Deepl();
        $text ="Aunque mucha gente piensa que la fachada original románica de la catedral, por su cara occidental, era el propio Pórtico de la Gloria y que sería revestido por la barroca de Fernando de Casas a partir de 1738, la verdad es que hubo una fachada exterior medieval ya desde la consagración del templo en 1211. Se encargó de levantarla el mismo taller del Maestro Mateo, que desde 1168 se ocupó de rematar la construcción de la Catedral.
        <IMAGE[fachada-del-obradoiro-Catedral_2009.jpg]>
        Es cierto que, si bien el Pórtico no era la fachada, sí que formaba parte de ella. La portada se abría con un gran arco central y dos laterales que se correspondían con los del Pórtico y, por tanto, con las naves de la iglesia. Además, estos arcos no tenían puertas. La catedral siempre estaba abierta para recibir a fieles y peregrinos. Los personajes del pórtico se proyectaban hacia el exterior, completando el mensaje Apocalíptico del tímpano central.";

        dd($deepl->get($text, 'en', 'es'));
        /* $deepl->get('Welcome', 'fr', 'en'); */

    }
}




