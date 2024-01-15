<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class WelcomEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        if(session()->exists('lang')) {
           $locale = session('lang');
        } else {
            $locale = "es";
        }




        switch($locale) {
            case "de":
                return (new MailMessage)
                    ->subject('Willkommensnachricht')
                    ->line('Hallo und herzlich willkommen bei CatedraldeSantiago.online! Wir freuen uns, Sie hier zu haben. Wir wünschen Ihnen viel Spaß beim Erkunden unserer Website. Wenn Sie Fragen haben oder Hilfe benötigen, zögern Sie nicht, uns zu kontaktieren, willkommen an Bord und haben eine erstaunliche Erfahrung mit uns!');
                break;
            case "en":
                return (new MailMessage)
                    ->subject('Welcome message')
                    ->line("Hello and welcome to CatedraldeSantiago.online! We are excited to have you here. We hope you enjoy exploring our website. If you have any questions or need help, please don't hesitate to contact us, welcome aboard and have an amazing experience with us!");
                break;
            case "fr":
                return (new MailMessage)
                    ->subject('Message de bienvenue')
                    ->line("Bonjour et bienvenue sur CatedraldeSantiago.online ! Nous sommes ravis de vous accueillir. Nous espérons que vous prendrez plaisir à explorer notre site web. Si vous avez des questions ou besoin d'aide, n'hésitez pas à nous contacter. Bienvenue à bord et bonne expérience avec nous !");
                break;
            case "it":
                return (new MailMessage)
                    ->subject('Messaggio di benvenuto')
                    ->line("Ciao e benvenuto su CatedraldeSantiago.online! Siamo felici di avervi qui. Ci auguriamo che vi divertiate ad esplorare il nostro sito. Se hai domande o bisogno di aiuto, non esitare a contattarci, benvenuto a bordo e buona esperienza con noi!");
                break;
            case "ja":
                return (new MailMessage)
                    ->subject('ウェルカムメッセージ')
                    ->line("CatedraldeSantiago.onlineへようこそ！私たちはあなたがここにいることに興奮しています。私たちのウェブサイトをお楽しみください。ご質問やお困りのことがございましたら、ご遠慮なくお問い合わせください！");
                break;
            case "ko":
                return (new MailMessage)
                    ->subject('환영 메시지')
                    ->line("CatedraldeSantiago.online에 오신 것을 환영합니다! 이곳을 방문하게 되어 기쁩니다. 저희 웹사이트를 즐겁게 둘러보시기 바랍니다. 궁금한 점이 있거나 도움이 필요하시면 언제든지 문의해 주시고, 저희와 함께 멋진 경험을 하시기 바랍니다!");
                break;
            case "pt":
                return (new MailMessage)
                    ->subject('Mensagem de boas-vindas')
                    ->line("Olá e bem-vindo a CatedraldeSantiago.online! Estamos muito contentes por vos ter aqui. Esperamos que goste de explorar o nosso sítio Web. Se tiver alguma dúvida ou precisar de ajuda, não hesite em contactar-nos, bem-vindo a bordo e tenha uma experiência fantástica connosco!");
                break;
            case "ru":
                return (new MailMessage)
                    ->subject('Приветственное сообщение')
                    ->line("Здравствуйте и добро пожаловать на CatedraldeSantiago.online! Мы рады видеть вас здесь. Мы надеемся, что вам понравится изучать наш сайт. Если у вас есть вопросы или вам нужна помощь, не стесняйтесь обращаться к нам, добро пожаловать на борт и приятных впечатлений от общения с нами!");
                break;
            case "zh_CN":
                return (new MailMessage)
                    ->subject('欢迎词')
                    ->line("您好，欢迎来到 CatedraldeSantiago.online！我们很高兴您能来到这里。希望您喜欢浏览我们的网站。如果您有任何问题或需要帮助，请随时联系我们！");
                break;

            default:
                return (new MailMessage)
                    ->subject('Mensaje de bienvenida')
                    ->line('¡Hola y bienvenido/a a CatedraldeSantiago.online! Estamos emocionados de tenerte aquí. Esperamos que disfrutes explorando nuestra web. Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos. ¡Bienvenido/a a bordo y que tengas una experiencia increíble con nosotros!');
                break;

        }


    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
