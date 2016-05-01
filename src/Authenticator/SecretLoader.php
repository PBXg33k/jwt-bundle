<?php
/*
 * This file is part of the KleijnWeb\JwtBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KleijnWeb\JwtBundle\Authenticator;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
interface SecretLoader
{
    /**
     * @param JwtToken $token
     *
     * @return string
     */
    public function load(JwtToken $token);
}
