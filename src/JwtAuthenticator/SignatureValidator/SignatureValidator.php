<?php
/*
 * This file is part of the KleijnWeb\JwtBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KleijnWeb\JwtBundle\JwtAuthenticator\SignatureValidator;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
interface SignatureValidator
{
    /**
     * @param string $payload
     * @param string $secret
     * @param string $signature
     *
     * @return bool
     */
    public function isValid($payload, $secret, $signature);
}
