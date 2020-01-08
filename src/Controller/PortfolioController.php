<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Info;
use App\Entity\Language;
use App\Entity\Hobbies;
use App\Entity\Experience;
use App\Entity\WebSkill;
use App\Entity\TechnicalSkill;
use App\Entity\User;
use App\Entity\Formation;
use App\Entity\Project;

class PortfolioController extends AbstractController
{

    /**
     * @Route("info", name="information")
     */
    public function index()
    {
        $pageSelected = "info";

        $em = $this->getDoctrine()->getManager(); 
        $info = $em->getRepository(Info::class)->findAll();
        $lang = $em->getRepository(Language::class)->findAll();
        $hobbies = $em->getRepository(Hobbies::class)->findAll();

        $birthDate = $info[0]->getBirthDate();
        $datetime1 = new \DateTime('now');
        $datetime2 = new \DateTime('1991-12-18');
        $age = $datetime1->diff($datetime2, true)->y;    

        return $this->render('portfolio/info.html.twig', [
            'info' => $info , 'age' => $age , 'lang' => $lang , 'hobbies' => $hobbies, 'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("experiencePro", name="experiencePro")
     */
    public function experiencePro()
    {
        $pageSelected = "expPro";

        $em = $this->getDoctrine()->getManager(); 
        $experience = $em->getRepository(Experience::class)->sortById();

        return $this->render('portfolio/experiencePro.html.twig', [
            'experience' => $experience, 'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("experienceWeb/{id}", name="experienceWeb")
     */
    public function experienceWeb($id)
    {
        $pageSelected = "expWeb";

        $em = $this->getDoctrine()->getManager(); 
        $projects = $em->getRepository(Project::class)->findAll();

        if (isset($id)) {
            $projectSelected = $id;
        }
        else{
            $projectSelected = 0;
        }

        return $this->render('portfolio/experienceWeb.html.twig', [
            'projects' => $projects, 'projectSelected' => $projectSelected, 'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("webSkill", name="webSkill")
     */
    public function webSkill()
    {
        $pageSelected = "webSkill";

        $em = $this->getDoctrine()->getManager(); 
        $webSkill = $em->getRepository(WebSkill::class)->sortByName();
        $technicalSkill = $em->getRepository(TechnicalSkill::class)->findAll();

        return $this->render('portfolio/webSkill.html.twig', [
            'webSkill' => $webSkill, 
            'technicalSkill' => $technicalSkill, 'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("formation", name="formation")
     */
    public function formation()
    {
        $pageSelected = "formation";

        $em = $this->getDoctrine()->getManager(); 
        $formation = $em->getRepository(Formation::class)->sortById(); 

        return $this->render('portfolio/formation.html.twig', [
            'formation' => $formation , 'pageSelected' => $pageSelected,
        ]);
    }
}

