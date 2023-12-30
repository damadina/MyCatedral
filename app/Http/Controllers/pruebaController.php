<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Google\Cloud\Translate\V2\TranslateClient;
use Google\Cloud\Translate\V3\TranslationServiceClient;
class pruebaController extends Controller
{
    public function index() {

$a = "Tour de l'horloge";
dd(str::slug($a));

        /* $texto = <<<EEEE
        <p>La fachada del Obradoiro, comúnmente denominada <strong>fachada de la Azabachería</strong> por estar en la zona de la ciudad que reunía – aún hoy abundan – los artesanos de esa semipreciosa piedra negra tan característica de Compostela, es la más reciente de las fachadas que abren la catedral a sus visitantes. Meta final de los peregrinos tras culminar el Camino Francés, ofrecía acceso al interior del templo que venían deseando alcanzar. La primitiva portada románica recibió el nombre de Puerta Francígena, y todo en su entorno inmediato estaba destinado a cubrir las primeras necesidades de los peregrinos.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5088.jpg]>
<p class="pt-4">Ante la puerta de la Fachada de Azabachería estaba situada la <i>Fons Mirabilis,</i> descrita con detalles en el <i>Códice Calixtino,</i> que “no tiene pareja en todo el mundo”. Formada por una concha de piedra y una columna de bronce rematada por leones de cuyas bocas manaba generoso caudal, la mandó construir el tesorero Bernardo en 1122. Su agua “de buen paladar, templada en invierno y fresca en verano” era bálsamo para la sed e higiene tanto de compostelanos como de peregrinos, que se aseaban aquí antes de acceder a la basílica.</p>
<IMAGE[fachada-de-azabacheria-Catedral_4019.jpg]>
<p class="pt-4">
En la misma plaza, ensanchada tras la concordia entre los monjes de Pinario y el cabildo de la catedral, estaban situados los “cambeadores”, la ubicación de los cuales aún recuerdan los puestos de souvenirs que se abren bajo arcos a la derecha de la Fachada de Azabachería. En ellos se cambiaba la moneda a los peregrinos para sus gastos en la ciudad y se encontraban también numerosos puestos de vendedores de conchas, morrales, botas de vino, zapatos, correas o cinturones, etc.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5074.jpg]>
<p class="pt-4" >El plan iconográfico de la románica Puerta del Paraíso, también descrito por el <i>Códice Calixtino</i>, giraba entorno al ciclo del Génesis. La creación, Adán y Eva, el Paraíso, el Pecado Original, la Reprensión y su consecuencia, la condena al trabajo para poder vivir; representada ésta por el ciclo de los meses del año con sus tareas y sinsabores, como el frío de febrero en un relieve conservado en el Museo Catedralicio. La primitiva fábrica medieval, muy dañada tras tantos siglos orientada al húmedo norte y por el fuego que la asoló en el siglo XVIII, estaba además “pasada de moda”. Así que entre 1757 y 1759 se aprobó su derribo e inicio de la nueva fachada en un estilo más acorde con los tiempos.</p><p>Eran tiempos del tránsito entre el barroco y el neoclasicismo, un cambio de estilo y de autores que marcaría el resultado final de la obra. Lucas Caaveiro inicia la obra ayudado por su colaborador Clemente Sarela. Ambos imprimieron al primer cuerpo y parte del segundo un sabor netamente barroco compostelano; con placas, sobrias columnas y orejeras en los vanos que recuerda a otras obras de la ciudad de este mismo estilo, como San Francisco o Santa María de Conxo.</p><p>Pero el cabildo no debía de estar demasiado satisfecho con el aspecto que iba tomando la Fachada de Azabachería.&nbsp; En 1765, tras reuniones y desencuentros con los maestros de obras, rompió definitivamente con ellos y con el barroco. Pasó a dirigir los trabajos Domingo Lois Monteagudo. Éste, siguiendo las trazas y dictámenes de la cada vez más influyente Real Academia de Bellas Artes de San Fernando de Madrid y las de su maestro Ventura Rodríguez, no rompió totalmente con lo ya trazado y construido. Ambos tratan de darle una apariencia más o menos clásica con medallones y trofeos militares, frontones y jarrones acróteros y con un remate a modo de calle única en la que cuatro atlantes sostienen un frontón curvo que sirve de base a un Santiago Peregrino, ante el que se arrodillan los reyes Ordoño II y Alfonso III.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5100.jpg]>
<p class="pt-4">El programa escultórico sufrió también importantes transformaciones entre la idea de Lucas Caaveiro y la obra definitiva. De su planteamiento iconográfico subsistió la imagen de la Fe que centra la fachada, de José Gambino. Obra rococó, ésta, con la que la escultura compostelana se despide del barroco, y de su último gran maestro en 1764.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5108.jpg]>
EEEE; */

        /* $translationClient = new TranslationServiceClient([
            'key' => 'AIzaSyARfrj-XYBlPX_LkvvVrik6GrVr4ZtEFpI'
        ]);
        $content = ['Fachada del Obradoiro', 'Torre del Reloj', 'Catedral de Santiago de Compostela'];
        $targetLanguage = 'es';
        $response = $translationClient->translateText(
            $content,
            $targetLanguage,
            TranslationServiceClient::locationName('[PROJECT_ID]', 'global')
        );

        foreach ($response->getTranslations() as $key => $translation) {
            $separator = $key === 2
                ? '!'
                : ', ';
            echo $translation->getTranslatedText() . $separator;
        } */









        $translate = new TranslateClient([
            'key' => 'AIzaSyARfrj-XYBlPX_LkvvVrik6GrVr4ZtEFpI'
        ]);

        $texto = "La fachada del Obradoiro";

        // Translate text from english to french.
        $result = $translate->translate($texto, [
            'target' => 'en'
        ]);



        dd($result['text']);



















        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $tr->setSource('es'); // Translate from English
        $tr->setTarget('en'); // Translate to Georgian
       /*  $d = $tr->translate('<p class="text-catedral>Torre del Reloj</p>'); */
        $a =<<<EEEE
        <p>La fachada norte, comúnmente denominada <strong>fachada de la Azabachería</strong> por estar en la zona de la ciudad que reunía – aún hoy abundan – los artesanos de esa semipreciosa piedra negra tan característica de Compostela, es la más reciente de las fachadas que abren la catedral a sus visitantes. Meta final de los peregrinos tras culminar el Camino Francés, ofrecía acceso al interior del templo que venían deseando alcanzar. La primitiva portada románica recibió el nombre de Puerta Francígena, y todo en su entorno inmediato estaba destinado a cubrir las primeras necesidades de los peregrinos.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5088.jpg]>
<p class="pt-4">Ante la puerta de la Fachada de Azabachería estaba situada la <i>Fons Mirabilis,</i> descrita con detalles en el <i>Códice Calixtino,</i> que “no tiene pareja en todo el mundo”. Formada por una concha de piedra y una columna de bronce rematada por leones de cuyas bocas manaba generoso caudal, la mandó construir el tesorero Bernardo en 1122. Su agua “de buen paladar, templada en invierno y fresca en verano” era bálsamo para la sed e higiene tanto de compostelanos como de peregrinos, que se aseaban aquí antes de acceder a la basílica.</p>
<IMAGE[fachada-de-azabacheria-Catedral_4019.jpg]>
<p class="pt-4">
En la misma plaza, ensanchada tras la concordia entre los monjes de Pinario y el cabildo de la catedral, estaban situados los “cambeadores”, la ubicación de los cuales aún recuerdan los puestos de souvenirs que se abren bajo arcos a la derecha de la Fachada de Azabachería. En ellos se cambiaba la moneda a los peregrinos para sus gastos en la ciudad y se encontraban también numerosos puestos de vendedores de conchas, morrales, botas de vino, zapatos, correas o cinturones, etc.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5074.jpg]>
<p class="pt-4" >El plan iconográfico de la románica Puerta del Paraíso, también descrito por el <i>Códice Calixtino</i>, giraba entorno al ciclo del Génesis. La creación, Adán y Eva, el Paraíso, el Pecado Original, la Reprensión y su consecuencia, la condena al trabajo para poder vivir; representada ésta por el ciclo de los meses del año con sus tareas y sinsabores, como el frío de febrero en un relieve conservado en el Museo Catedralicio. La primitiva fábrica medieval, muy dañada tras tantos siglos orientada al húmedo norte y por el fuego que la asoló en el siglo XVIII, estaba además “pasada de moda”. Así que entre 1757 y 1759 se aprobó su derribo e inicio de la nueva fachada en un estilo más acorde con los tiempos.</p><p>Eran tiempos del tránsito entre el barroco y el neoclasicismo, un cambio de estilo y de autores que marcaría el resultado final de la obra. Lucas Caaveiro inicia la obra ayudado por su colaborador Clemente Sarela. Ambos imprimieron al primer cuerpo y parte del segundo un sabor netamente barroco compostelano; con placas, sobrias columnas y orejeras en los vanos que recuerda a otras obras de la ciudad de este mismo estilo, como San Francisco o Santa María de Conxo.</p><p>Pero el cabildo no debía de estar demasiado satisfecho con el aspecto que iba tomando la Fachada de Azabachería.&nbsp; En 1765, tras reuniones y desencuentros con los maestros de obras, rompió definitivamente con ellos y con el barroco. Pasó a dirigir los trabajos Domingo Lois Monteagudo. Éste, siguiendo las trazas y dictámenes de la cada vez más influyente Real Academia de Bellas Artes de San Fernando de Madrid y las de su maestro Ventura Rodríguez, no rompió totalmente con lo ya trazado y construido. Ambos tratan de darle una apariencia más o menos clásica con medallones y trofeos militares, frontones y jarrones acróteros y con un remate a modo de calle única en la que cuatro atlantes sostienen un frontón curvo que sirve de base a un Santiago Peregrino, ante el que se arrodillan los reyes Ordoño II y Alfonso III.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5100.jpg]>
<p class="pt-4">El programa escultórico sufrió también importantes transformaciones entre la idea de Lucas Caaveiro y la obra definitiva. De su planteamiento iconográfico subsistió la imagen de la Fe que centra la fachada, de José Gambino. Obra rococó, ésta, con la que la escultura compostelana se despide del barroco, y de su último gran maestro en 1764.</p>
<IMAGE[fachada-de-azabacheria-Catedral_5108.jpg]>
EEEE;

        $responseArray = $tr->getResponse($a);
        dd($responseArray);




        $authKey = "89786711-b707-a136-0673-8cc3b8839123"; // Replace with your key
        $translator = new \DeepL\Translator($authKey);

        $a = "Fachada del Obradoiro";

        $locale = "fr";

        $result = $translator->translateText($a, 'es', $locale, ['tag_handling' => 'html'],);
        dd(Str::slug($result->text)); // Bonjour, le monde!



        /* $deepl = new Deepl();
        $text ="Aunque mucha gente piensa que la fachada original románica de la catedral, por su cara occidental, era el propio Pórtico de la Gloria y que sería revestido por la barroca de Fernando de Casas a partir de 1738, la verdad es que hubo una fachada exterior medieval ya desde la consagración del templo en 1211. Se encargó de levantarla el mismo taller del Maestro Mateo, que desde 1168 se ocupó de rematar la construcción de la Catedral.
        <IMAGE[fachada-del-obradoiro-Catedral_2009.jpg]>
        Es cierto que, si bien el Pórtico no era la fachada, sí que formaba parte de ella. La portada se abría con un gran arco central y dos laterales que se correspondían con los del Pórtico y, por tanto, con las naves de la iglesia. Además, estos arcos no tenían puertas. La catedral siempre estaba abierta para recibir a fieles y peregrinos. Los personajes del pórtico se proyectaban hacia el exterior, completando el mensaje Apocalíptico del tímpano central.";

        dd($deepl->get($text, 'en', 'es')); */


    }
}




