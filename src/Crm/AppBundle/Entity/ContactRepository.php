<?php

namespace Crm\AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ContactRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactRepository extends EntityRepository
{
    /**
     * Get list of contacts filtered and paginated.
     *
     * @param int $page Current page.
     * @param int $page_size Number of items per page.
     * @return Paginator
     */
    public function getContactsList($page=1, $page_size = 10) {
        $dql = <<<'DQL'
SELECT c FROM
    CrmAppBundle:contact c
DQL;

        $query = $this->getEntityManager()
            ->createQuery($dql)
            ->setFirstResult( $page_size * ( $page - 1 ) )
            ->setMaxResults( $page_size );

        return new Paginator($query);
    }
}
