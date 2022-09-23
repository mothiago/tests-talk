<?php


namespace App\Packages\User\Domain\Repository;

use App\Packages\Base\Domain\Repository\Repository;
use App\Packages\Empresa\Domain\Model\Empresa;
use App\Packages\User\Domain\Model\User;
use Doctrine\ORM\NonUniqueResultException;

class UserRepository extends Repository
{
    protected string $entityName = User::class;

    /**
     * @param string $id
     * @return User|null
     * @throws NonUniqueResultException
     */
    public function findById(string $id): ?User
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        return $queryBuilder->select('user')
            ->from($this->entityName, 'user')
            ->where('user = :userId')
            ->setParameters([
                'userId' => $id,
            ])
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByEmpresaId(string $empresaId): ?User
    {
        return $this->findOneBy(['empresa' => $empresaId]);
    }

    public function findByPhoneNumber(string $phoneNumber): ?User
    {
        return $this->findOneBy(['phoneNumber' => $phoneNumber]);
    }
}
