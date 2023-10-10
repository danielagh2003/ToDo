<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository;
use App\Entity\Student;
use App\Form\StudentType;
use App\Service\StudentService;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    #[Route('/student/view/{id}', name: 'app_student_view')]
    public function view(int $id,StudentService $entityService): Response
    {
      return new Response($id);
    }

#[Route('/student/create', name: 'studentcreate')]
public function create(EntityManagerInterface $entityManager, Request $request): Response
{
    $student = new Student();
    $form = $this->createForm(StudentType::class, $student);
    $form->handleRequest($request);
    //daca formularul nu este trimis sau nu este valid
//el va fi afisat din nou pentru ca utilizatorul sa poate corecta erorile
if(!($form->isSubmitted() && $form->isValid())){
    return $this->render('student/create.html.twig',[
    'student_form' => $form,]);
}

//Procesarea formularului, una dintre variante
$student = $form->getData();
$entityManager->persist($student);
$entityManager->flush($student);
return $this->redirectToRoute('studentupdate', ['id'=>$student->getId()]);

    }

#[Route('/student/update/{id}', name: 'studentupdate')]
public function update(int $id,StudentRepository $StudentRepository): Response
{
    $student= $StudentRepository->find($id);
$form = $this->createForm(StudentType::class, $student);
return $this->render('student/create.html.twig',[
'student_form' => $form,
]);
 }
 #[Route('/student/delete/{id}', name: 'studentdelete')]
public function delete(int $id, StudentRepository $studentRepository, EntityManagerInterface $entityManager): Response
{
    $student = $studentRepository->find($id);
    if (!$student) {
        throw $this->createNotFoundException('Student not found');
    }
    $entityManager->remove($student);
    $entityManager->flush();

    return $this->redirectToRoute('studentcreate');
}

}
