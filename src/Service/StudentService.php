<?php
namespace App\Service;

use App\Entity\Student;
use App\Exception\EntityNotFoundException;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class StudentService implements EntityServiceInterface{

    private StudentRepository $repository;
    private EntityManagerInterface $entityManager;
 public function __construct(EntityManagerInterface $entityManager){
    $this->entityManager = $entityManager;
    $this->repository=$entityManager->getRepository(StudentRepository::class);

 }

public function getAll(): array {
return $this->repository->findAll();

}
public function getOne(int $id){
 $student = $this->repository->find($id);
 if(!$student){
    throw new EntityNotFoundException($id,Student::class);
      }
    return $student;
   }
 }