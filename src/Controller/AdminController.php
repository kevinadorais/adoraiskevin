<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\InfoType;
use App\Form\HobbiesType;
use App\Form\ExperienceType;
use App\Form\WebSkillType;
use App\Form\TechnicalSkillType;
use App\Form\FormationType;
use App\Entity\Info;
use App\Entity\Language;
use App\Entity\Hobbies;
use App\Entity\Experience;
use App\Entity\WebSkill;
use App\Entity\TechnicalSkill;
use App\Entity\User;
use App\Entity\Formation;

class AdminController extends AbstractController
{
    /**
     * @Route("admin/infoedit/{id}", name="infoedit")
     */
    public function infoEdit($id, Request $request)
    {   
        $pageSelected = "info";

        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(Info::class)->find($id);
        $form = $this->createForm(InfoType::class , $task);            
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();           
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('information');
        }
        return $this->render('edit/infoEdit.html.twig', [
            'form'=>$form->createView(),
            'info'=>$task,
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/hobbieadd", name="hobbieadd")
     */
    public function hobbieAdd(Request $request)
    {   
        $pageSelected = "info";

        $task = new Hobbies();
        $form = $this->createForm(HobbiesType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('information');
        }
        return $this->render('add/hobbieAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/hobbieremove/{id}", name="hobbieremove")
     */
    public function hobbieRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $hobbies = $em->getRepository(Hobbies::class)->find($id);

        $em->remove($hobbies);
        $em->flush();

        return $this->redirectToRoute("information");
    }

    /**
     * @Route("admin/expadd", name="experienceadd")
     */
    public function experienceAdd(Request $request)
    {
        $pageSelected = "expPro";

        $task = new Experience();
        $form = $this->createForm(ExperienceType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('experience');
        }
        return $this->render('add/experienceAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/expremove/{id}", name="experienceremove")
     */
    public function experienceRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $experience = $em->getRepository(Experience::class)->find($id);

        $em->remove($experience);
        $em->flush();

        return $this->redirectToRoute("experience");
    }

    /**
     * @Route("admin/webskilladd", name="webskilladd")
     */
    public function webSkillAdd(Request $request)
    {   
        $pageSelected = "webSkill";

        $task = new WebSkill();
        $form = $this->createForm(WebSkillType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkill');
        }
        return $this->render('add/webSkillAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/webskilledit/{id}", name="webskilledit")
     */
    public function webSkillEdit($id, Request $request)
    {   
        $pageSelected = "webSkill";

        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(WebSkill::class)->find($id);
        $form = $this->createForm(WebSkillType::class , $task);            
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();           
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkill');
        }
        return $this->render('edit/webSkillEdit.html.twig', [
            'form'=>$form->createView(),
            'webSkill'=>$task,
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/webskillremove/{id}", name="webskillremove")
     */
    public function webSkillRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $webSkill = $em->getRepository(WebSkill::class)->find($id);

        $em->remove($webSkill);
        $em->flush();

        return $this->redirectToRoute("webSkill");
    }

    /**
     * @Route("admin/techskilladd", name="technicalSkillAdd")
     */
    public function technicalSkillAdd(Request $request)
    {   
        $pageSelected = "webSkill";

        $task = new TechnicalSkill();
        $form = $this->createForm(TechnicalSkillType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkill');
        }
        return $this->render('add/technicalSkillAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/techskillremove/{id}", name="technicalSkillRemove")
     */
    public function technicalSkillRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $technicalSkill = $em->getRepository(TechnicalSkill::class)->find($id);

        $em->remove($technicalSkill);
        $em->flush();

        return $this->redirectToRoute("webSkill");
    }

    /**
     * @Route("admin/formationadd", name="formationadd")
     */
    public function formationAdd(Request $request)
    {
        $pageSelected = "formation";

        $task = new Formation();
        $form = $this->createForm(FormationType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('formation');
        }
        return $this->render('add/formationAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/formationremove/{id}", name="formationremove")
     */
    public function formationRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository(Formation::class)->find($id);

        $em->remove($formation);
        $em->flush();

        return $this->redirectToRoute("formation");
    }
}