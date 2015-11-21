<?php
/*
 * This file is part of the KleijnWeb\JwtBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KleijnWeb\JwtBundle\Tests\Functional\PetStore\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
class PetController
{
    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @param Request $request
     *
     * @return array
     */
    public function findPetsByStatus(Request $request)
    {
        return [];
    }

    /**
     * @param array $body
     *
     * @return array
     */
    public function addPet(array $body)
    {
        $body['status'] = 'available';

        return $body;
    }
}
