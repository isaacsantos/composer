<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer\Test\IO;

use Composer\IO\NullIO;
use Composer\Test\TestCase;

class NullIOTest extends TestCase
{
    public function testIsInteractive()
    {
        $io = new NullIO();

        $this->assertFalse($io->isInteractive());
    }

    public function testHasAuthorization()
    {
        $io = new NullIO();

        $this->assertFalse($io->hasAuthorization('foo'));
    }

    public function testAskAndHideAnswer()
    {
        $io = new NullIO();

        $this->assertNull($io->askAndHideAnswer('foo'));
    }

    public function testGetAuthorizations()
    {
        $io = new NullIO();

        $this->assertInternalType('array', $io->getAuthorizations());
        $this->assertEmpty($io->getAuthorizations());
        $this->assertEquals(array('username' => null, 'password' => null), $io->getAuthorization('foo'));
    }

    public function testAsk()
    {
        $io = new NullIO();

        $this->assertEquals('foo', $io->ask('bar', 'foo'));
    }

    public function testAskConfirmation()
    {
        $io = new NullIO();

        $this->assertEquals('foo', $io->askConfirmation('bar', 'foo'));
    }

    public function testAskAndValidate()
    {
        $io = new NullIO();

        $this->assertEquals('foo', $io->askAndValidate('question', 'validator', false, 'foo'));
    }
}
