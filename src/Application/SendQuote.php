<?php
namespace App\Application;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\WebsiteQuote;

class SendQuote extends AbstractController{

    /** 
     * var \Swift_Mailer
    */
    private $mailer;
    private $quote;

    public function __Construct(\Swift_Mailer $mailer){
        $this->mailer = $mailer;
    }

    public function sendQuoteMail($quote){
        
        $message = (new \Swift_Message('Demande de devis : '. $quote->getName()))
            ->setFrom($quote->getEmail())
            ->setTo('kevin.adorais@gmail.com')
            ->setReplyTo($quote->getEmail())
            ->setBody(
                $this->renderView('emails/websiteQuoteMail.html.twig',
                    ['quote' => $quote]
                ),
                'text/html'
            );

        $this->mailer->send($message);
    }
}