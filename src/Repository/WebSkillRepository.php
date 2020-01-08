<?php

namespace App\Repository;

use App\Entity\WebSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WebSkill|null find($id, $lockMode = null, $lockVersion = null)
 * @method WebSkill|null findOneBy(array $criteria, array $orderBy = null)
 * @method WebSkill[]    findAll()
 * @method WebSkill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WebSkillRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WebSkill::class);
    }

    // /**
    //  * @return WebSkill[] Returns an array of WebSkill objects
    //  */
    
    public function sortByName()
    {
        return $this->createQueryBuilder('webSkill')
            ->orderBy('webSkill.name', 'ASC')
            ->setMaxResults(15)
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?WebSkill
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
