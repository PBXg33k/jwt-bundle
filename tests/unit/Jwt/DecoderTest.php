<?php
/*
 * This file is part of the KleijnWeb\JwtBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace KleijnWeb\JwtBundle\Tests\Jwt;

use KleijnWeb\JwtBundle\Jwt\Decoder;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
class DecoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function willThrowExceptionWhenJsonDecodeFails()
    {
        $decoder = new Decoder();
        $decoder->jsonDecode('lkjhhkjjhkl');
    }

    /**
     * @param string $data
     * @param array  $source
     *
     * @test
     * @dataProvider testSetProvider
     */
    public function willDecodeTestCasesFromJwtDotIo($source, $data)
    {
        $decoder = new Decoder();
        $this->assertSame($source, $decoder->decode($data));
    }

    /**
     * @see          http://jwt.io/
     * @return array
     */
    public static function testSetProvider()
    {
        return [
            [
                [
                    'alg' => 'HS256',
                    'typ' => 'JWT',
                ],
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9'
            ],
            [
                [
                    'sub'   => '1234567890',
                    'name'  => 'John Doe',
                    'admin' => true,
                ]
                ,
                'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9'
            ]
        ];
    }
}
