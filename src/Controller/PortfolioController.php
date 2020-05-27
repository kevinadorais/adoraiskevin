<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
Use App\Application\SendQuote;
use App\Entity\Info;
use App\Entity\Language;
use App\Entity\Hobbies;
use App\Entity\Experience;
use App\Entity\WebSkill;
use App\Entity\TechnicalSkill;
use App\Entity\User;
use App\Entity\Formation;
use App\Entity\Projects;
use App\Entity\WebsiteQuote;
use App\Form\WebsiteQuoteType;

class PortfolioController extends AbstractController
{
    /**
     * @Route("home", name="home")
     */
    public function home()
    {
        $pageSelected = "home";   

        return $this->render('default/home.html.twig', [
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("quote", name="quote")
     */
    public function quote(Request $request, SendQuote $sendQuote)
    {
        $pageSelected = "home"; 

        $form = $this->createForm(WebsiteQuoteType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quote = $form->getData();
            $send = $sendQuote->sendQuoteMail($quote);

            $this->addFlash('success', "Votre demande a bien été envoyée.");
            return $this->redirectToRoute('home');
        }

        return $this->render('form/websiteQuoteForm.html.twig', [
            'pageSelected' => $pageSelected,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("presentation", name="presentation")
     */
    public function presentation()
    {
        $pageSelected = "presentation";

        $em = $this->getDoctrine()->getManager(); 
        $presentation = $em->getRepository(Info::class)->findAll();
        $languages = $em->getRepository(Language::class)->findAll();
        $hobbies = $em->getRepository(Hobbies::class)->findAll();

        $datetime1 = new \DateTime('now');
        $datetime2 = new \DateTime('1991-12-18');
        $age = $datetime1->diff($datetime2, true)->y;    

        return $this->render('default/presentation.html.twig', [
            'presentation' => $presentation , 
            'age' => $age , 
            'languages' => $languages , 
            'hobbies' => $hobbies, 
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("/proJourney", name="proJourney")
     */
    public function proJourney()
    {
        $pageSelected = "proJourney";

        $em = $this->getDoctrine()->getManager(); 
        $formations = $em->getRepository(Formation::class)->sortById();
        $proExps = $em->getRepository(Experience::class)->sortById(); 

        return $this->render('default/professionalJourney.html.twig', [
            'formations' => $formations , 
            'pageSelected' => $pageSelected,
            'proExps' => $proExps,
        ]);
    }

    /**
     * @Route("/webSkills/{id}", name="webSkills")
     */
    public function webSkills($id)
    {
        $pageSelected = "webSkills";

        $em = $this->getDoctrine()->getManager();
        $technos = $em->getRepository(WebSkill::class)->sortByName();
        $skills = $em->getRepository(TechnicalSkill::class)->findAll();
        $projects = $em->getRepository(Projects::class)->findAll();

        if (isset($id)) {
            $projectSelected = $id;
        }
        else{
            $projectSelected = 0;
        }

        return $this->render('default/webExperiences.html.twig', [
            'technos' => $technos,
            'skills' => $skills,
            'projects' => $projects,
            'pageSelected' => $pageSelected,
            'projectSelected' => $projectSelected,
        ]);
    }
}

