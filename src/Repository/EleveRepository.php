<?php

namespace App\Repository;

use App\Entity\Eleve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface ;


/**
 * @method Eleve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eleve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eleve[]    findAll()
 * @method Eleve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EleveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eleve::class);
    }
    public function findeleve(string $a, string $b){
      
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Eleve p
            WHERE p.niveau = :niveau
            ORDER BY p.idEleve ASC'
        )->setParameter('niveau', $a);

        // returns an array of Product objects
        return $query->getResult();
    }
    public function findniveau(){
      
         $conn = $this->getEntityManager()->getConnection();
          $sql = '
        SELECT DISTINCT p.niveau FROM eleve p
        ';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    dd($stmt->fetchAll());
        return $stmt->fetchAll();
        // returns an array of Product objects
    }
    /*

 return $this->createQueryBuilder('e')
            ->andWhere('e.niveau = :val')
            ->setParameter('val', $a)
            ->getQuery()
            ->getOneOrNullResult()

            
        ;
    $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Product p
            WHERE p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', $price);

        // returns an array of Product objects
        return $query->getResult();*/
    // /**
    //  * @return Eleve[] Returns an array of Eleve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Eleve
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
