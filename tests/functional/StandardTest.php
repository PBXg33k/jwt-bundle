<?php
/*
 * This file is part of the KleijnWeb\JwtBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KleijnWeb\JwtBundle\Tests\Functional;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
class StandardTest extends FunctionalTest
{
    protected static function getEnv(): string
    {
        return 'standard';
    }
}
