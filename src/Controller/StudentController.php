<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StudentController extends AbstractController
{
    /**
     * @Route("/student/index", name="student_index", methods={"GET"})
     */
    public function index(StudentRepository $studentRepository): Response
    {
        return $this->render('student/index.html.twig', [
            'students' => $studentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/newstudent", name="student_new", methods={"GET","POST"})
     */
    public function new(Request $request, StudentRepository $studentRepository): Response
    {
        $is_student = $studentRepository->findOneBy(['user' => $this->getUser()]);
        if ($is_student) {
            return $this->redirectToRoute('home');
        }

        $student = new Student();
        $form = $this->createForm(StudentType::class, $student);
        $form->handleRequest($request);

        $module = array(
            'miage-5' => 
                [
                    1 => 'Mise à niveau',
                    2 => 'Statestiques',
                    3 => 'Système d\'informations',
                    4 => 'Programmation avancée',
                    5 => 'Réseaux',
                    6 => 'Gestion comptable',
                    7 => 'Tech. de communication',
                    8 => 'Anglais',
                    9 => 'Projet informatique',
                    10 => 'Projet professionnel'
                ],
            'miage-6' => 
                [
                    1 => 'Framework web',
                    2 => 'Recherche opérationnelle',
                    3 => 'Programmation N Tiers',
                    4 => 'Projet informatique 2',
                    5 => 'Droit',
                    6 => 'Environnement économique',
                    7 => 'Stage ou projet fin d\'études',
                    8 => 'Anglais'
                ],

            'ing-inf-5' => 
                [
                    1 => 'Prog impérative et objet',
                    2 => 'Projet perso et pro',
                    3 => 'Réseaux',
                    4 => 'Analyse des algorithmes',
                    5 => 'Conception oriontée objet',
                    6 => 'Langage et automate',
                    7 => 'Logique',
                    8 => 'Anglais'
                ],
            'ing-inf-6' => 
                [
                    1 => 'Framework web',
                    2 => 'Programmation N Tiers',
                    3 => 'Langages algébriques',
                    4 => 'Programmation Logique',
                    5 => 'Projet informatique',
                    6 => 'Techniques de communication',
                    7 => 'Anglais',
                    8 => 'Stage ou projet fin d\'études',
                ],
            
        );

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $modules = $_POST['module'];
            $parcours_semestre = $_POST['parcours_semestre'];

            $regimeSpecial = $form->get('regimespecialetude')->getData();
            if ($regimeSpecial == 'Oui') {
                $typecontent = $form->get('typecontrole')->getData();
                if ($typecontent == 'Autre') {
                    $typecontent = $form->get('autretypecontrole')->getData();
                }
            $student->setTypecontrole($typecontent);
            }

            $student->setModule($modules[$parcours_semestre]);
            $student->setValide(0);

            $student->setUser($this->getUser());

            $entityManager->persist($student);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('student/new.html.twig', [
            'modules' => $module,
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/student/{id}", name="student_show", methods={"GET"})
     */
    public function show(Student $student): Response
    {



        $module = array(
            'miage-5' => 
                [
                    1 => 'Mise à niveau',
                    2 => 'Statestiques',
                    3 => 'Système d\'informations',
                    4 => 'Programmation avancée',
                    5 => 'Réseaux',
                    6 => 'Gestion comptable',
                    7 => 'Tech. de communication',
                    8 => 'Anglais',
                    9 => 'Projet informatique',
                    10 => 'Projet professionnel'
                ],
            'miage-6' => 
                [
                    1 => 'Framework web',
                    2 => 'Recherche opérationnelle',
                    3 => 'Programmation N Tiers',
                    4 => 'Projet informatique 2',
                    5 => 'Droit',
                    6 => 'Environnement économique',
                    7 => 'Stage ou projet fin d\'études',
                    8 => 'Anglais'
                ],

            'ing-inf-5' => 
                [
                    1 => 'Prog impérative et objet',
                    2 => 'Projet perso et pro',
                    3 => 'Réseaux',
                    4 => 'Analyse des algorithmes',
                    5 => 'Conception oriontée objet',
                    6 => 'Langage et automate',
                    7 => 'Logique',
                    8 => 'Anglais'
                ],
            'ing-inf-6' => 
                [
                    1 => 'Framework web',
                    2 => 'Programmation N Tiers',
                    3 => 'Langages algébriques',
                    4 => 'Programmation Logique',
                    5 => 'Projet informatique',
                    6 => 'Techniques de communication',
                    7 => 'Anglais',
                    8 => 'Stage ou projet fin d\'études',
                ],
            
        );

        if ($student->getParcours() == 'MIAGE') {
            if ($student->getSemestre() =='5') {
                $key = 'miage-5';
            }elseif ($student->getSemestre() =='6') {
                $key = 'miage-6';
            }
        }elseif ($student->getParcours() == 'INGENIERIE INFORMATIQUE') {
            if ($student->getSemestre() =='5') {
                $key = 'ing-inf-5';
            }elseif ($student->getSemestre() =='6') {
                $key = 'ing-inf-6';
            }
        }


        return $this->render('student/show.html.twig', [
            'student' => $student,
            'module' => $module[$key] ,
        ]);
    }

    /**
     * @Route("/student/{id}/edit", name="student_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Student $student): Response
    {
        $student->setValide(1);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('student_index');

    }

    /**
     * @Route("/student/{id}", name="student_delete", methods={"POST"})
     */
    public function delete(Request $request, Student $student): Response
    {
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($student);
            $entityManager->flush();
        }
        return $this->redirectToRoute('student_index');
    }
}
