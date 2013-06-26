<?php

/**
 * This file is part of the pantarei/oauth2-bundle package.
 *
 * (c) Wong Hoi Sing Edison <hswong3i@pantarei-design.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PantaRei\Bundle\OAuth2Bundle\Entity;

use Doctrine\ORM\EntityRepository;
use PantaRei\OAuth2\Model\AuthorizeInterface;
use PantaRei\OAuth2\Model\AuthorizeManagerInterface;

/**
 * AuthorizeManager
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AuthorizeManager extends EntityRepository implements AuthorizeManagerInterface
{
    public function getClass()
    {
        return $this->getClassName();
    }

    public function createAuthorize()
    {
        $class = $this->getClass();
        return new $class();
    }

    public function deleteAuthorize(AuthorizeInterface $authorize)
    {
        $this->getEntityManager()->remove($authorize);
        $this->getEntityManager()->flush();
    }

    public function reloadAuthorize(AuthorizeInterface $authorize)
    {
        $this->getEntityManager()->refresh($authorize);
    }

    public function updateAuthorize(AuthorizeInterface $authorize)
    {
        $this->getEntityManager()->persist($authorize);
        $this->getEntityManager()->flush();
    }

    public function findAuthorizeByClientIdAndUsername($client_id, $username)
    {
        return $this->findOneBy(array(
            'client_id' => $client_id,
            'username' => $username,
        ));
    }
}
