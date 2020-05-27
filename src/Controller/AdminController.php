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
use App\Form\ProjectsType;
use App\Entity\Info;
use App\Entity\Language;
use App\Entity\Hobbies;
use App\Entity\Experience;
use App\Entity\WebSkill;
use App\Entity\TechnicalSkill;
use App\Entity\User;
use App\Entity\Formation;
use App\Entity\Projects;

class AdminController extends AbstractController
{
    /**
     * @Route("admin/presentationEdit/{id}", name="presentationEdit")
     */
    public function presentationEdit($id, Request $request)
    {   
        $pageSelected = "presentation";

        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(Info::class)->find($id);
        $form = $this->createForm(InfoType::class , $task);            
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();           
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('presentation');
        }
        return $this->render('edit/presentationEdit.html.twig', [
            'form'=>$form->createView(),
            'presentation'=>$task,
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/hobbieAdd", name="hobbieAdd")
     */
    public function hobbieAdd(Request $request)
    {   
        $pageSelected = "presentation";

        $task = new Hobbies();
        $form = $this->createForm(HobbiesType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('presentation');
        }
        return $this->render('add/hobbieAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/hobbieRemove/{id}", name="hobbieRemove")
     */
    public function hobbieRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $hobbies = $em->getRepository(Hobbies::class)->find($id);

        $em->remove($hobbies);
        $em->flush();

        return $this->redirectToRoute("presentation");
    }

    /**
     * @Route("admin/formationAdd", name="formationAdd")
     */
    public function formationAdd(Request $request)
    {
        $pageSelected = "proJourney";

        $task = new Formation();
        $form = $this->createForm(FormationType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('proJourney');
        }
        return $this->render('add/formationAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/formationRemove/{id}", name="formationRemove")
     */
    public function formationRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $formation = $em->getRepository(Formation::class)->find($id);

        $em->remove($formation);
        $em->flush();

        return $this->redirectToRoute("proJourney");
    }

    /**
     * @Route("admin/proExpAdd", name="proExpAdd")
     */
    public function proExpAdd(Request $request)
    {
        $pageSelected = "proJourney";

        $task = new Experience();
        $form = $this->createForm(ExperienceType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('proJourney');
        }
        return $this->render('add/proExpAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/proExpRemove/{id}", name="proExpRemove")
     */
    public function proExpRemove($id)
    {          
        $em = $this->getDoctrine()->getManager();
        $experience = $em->getRepository(Experience::class)->find($id);

        $em->remove($experience);
        $em->flush();

        return $this->redirectToRoute("proJourney");
    }

    /**
     * @Route("admin/technoAdd/{projectId}", name="technoAdd")
     */
    public function technoAdd(Request $request, $projectId)
    {   
        $pageSelected = "webSkills";

        $task = new WebSkill();
        $form = $this->createForm(WebSkillType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkills', ['id' => $projectId]);
        }
        return $this->render('add/technoAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/technoEdit/{projectId}/{id}", name="technoEdit")
     */
    public function technoEdit($projectId, $id, Request $request)
    {   
        $pageSelected = "webSkills";

        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(WebSkill::class)->find($id);
        $form = $this->createForm(WebSkillType::class , $task);            
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();           
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkills', ['id' => $projectId]);
        }
        return $this->render('edit/technoEdit.html.twig', [
            'form'=>$form->createView(),
            'webSkill'=>$task,
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/technoRemove/{projectId}/{id}", name="technoRemove")
     */
    public function technoRemove($projectId, $id)
    {          
        $em = $this->getDoctrine()->getManager();
        $webSkill = $em->getRepository(WebSkill::class)->find($id);

        $em->remove($webSkill);
        $em->flush();

        return $this->redirectToRoute('webSkills', ['id' => $projectId]);
    }

    /**
     * @Route("admin/skillAdd/{projectId}", name="skillAdd")
     */
    public function skillAdd(Request $request, $projectId)
    {   
        $pageSelected = "webSkills";

        $task = new TechnicalSkill();
        $form = $this->createForm(TechnicalSkillType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkills', ['id' => $projectId]);
        }
        return $this->render('add/skillAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/skillRemove/{projectId}/{id}", name="skillRemove")
     */
    public function skillRemove($projectId, $id)
    {          
        $em = $this->getDoctrine()->getManager();
        $technicalSkill = $em->getRepository(TechnicalSkill::class)->find($id);

        $em->remove($technicalSkill);
        $em->flush();

        return $this->redirectToRoute("webSkills", ['id' => $projectId]);
    }

    /**
     * @Route("admin/projectAdd/{projectId}", name="projectAdd")
     */
    public function projectAdd(Request $request, $projectId)
    {   
        $pageSelected = "webSkills";

        $task = new projects();
        $form = $this->createForm(ProjectsType::class , $task);   
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkills', ['id' => $projectId]);
        }
        return $this->render('add/projectAdd.html.twig', [
            'form' => $form->createView(),
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/projectEdit/{projectId}/{id}", name="projectEdit")
     */
    public function projectEdit($projectId, $id, Request $request)
    {   
        $pageSelected = "webSkills";

        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(Projects::class)->find($id);
        $form = $this->createForm(ProjectsType::class , $task);            
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();           
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('webSkills', ['id' => $projectId]);
        }
        return $this->render('edit/technoEdit.html.twig', [
            'form'=>$form->createView(),
            'project'=>$task,
            'pageSelected' => $pageSelected,
        ]);
    }

    /**
     * @Route("admin/projectRemove/{projectId}/{id}", name="projectRemove")
     */
    public function projectRemove($projectId, $id)
    {          
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository(projects::class)->find($id);

        $em->remove($project);
        $em->flush();

        return $this->redirectToRoute("webSkills", ['id' => $projectId]);
    }
}