<?php

namespace FormulariosBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PcFormularioRepository extends EntityRepository {

    public function ultimoConsecutivo() {
        $em = $this->getEntityManager();

        $qb = $em->createQueryBuilder();
        $qb->select('max(a.numeroproceso) as numeroproceso')
                ->from('FormulariosBundle:PcFormulario', 'a')
                ->orderBy('a.numeroproceso', 'asc');

        $query = $qb->getQuery();

        return $query->getSingleScalarResult();
    }

}
