<?php
/*
 * This file is part of the KleijnWeb\JwtBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace KleijnWeb\JwtBundle\Tests\Authenticator;

use KleijnWeb\JwtBundle\Authenticator\Encoder;

/**
 * @author John Kleijn <john@kleijnweb.nl>
 */
class EncoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $data
     * @param array  $source
     *
     * @test
     * @dataProvider testSetProvider
     */
    public function willDecodeTestCasesFromJwtDotIo($source, $data)
    {
        $encoder = new Encoder();
        $this->assertSame($data, $encoder->encode($source));
    }

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function willThrowExceptionWhenJsonDecodeFails()
    {
        $decoder = new Encoder();
        $decoder->jsonEncode("\xB1\x31");
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
