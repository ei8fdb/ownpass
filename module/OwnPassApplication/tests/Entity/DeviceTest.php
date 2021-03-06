<?php
/**
 * This file is part of OwnPass. (https://github.com/ownpass/)
 *
 * @link https://github.com/ownpass/ownpass for the canonical source repository
 * @copyright Copyright (c) 2016-2017 OwnPass. (https://github.com/ownpass/)
 * @license https://raw.githubusercontent.com/ownpass/ownpass/master/LICENSE MIT
 */

namespace OwnPassApplicationTest\Entity;

use DateTimeInterface;
use OwnPassApplication\Entity\Device;
use OwnPassUser\Entity\Account;
use PHPUnit_Framework_TestCase;
use Ramsey\Uuid\UuidInterface;

class DeviceTest extends PHPUnit_Framework_TestCase
{
    private $account;
    private $device;

    protected function setUp()
    {
        $this->account = new Account('identity', 'credential', 'firstName', 'lastName');
        $this->device = new Device($this->account, 'name', 'description', 'userAgent');
    }

    public function testGetId()
    {
        // Arrange
        // ...

        // Act
        $result = $this->device->getId();

        // Assert
        $this->assertInstanceOf(UuidInterface::class, $result);
    }

    public function testGetAccount()
    {
        // Arrange
        // ...

        // Act
        $result = $this->device->getAccount();

        // Assert
        $this->assertEquals($this->account, $result);
    }

    public function testGetCreationDate()
    {
        // Arrange
        // ...

        // Act
        $result = $this->device->getCreationDate();

        // Assert
        $this->assertInstanceOf(DateTimeInterface::class, $result);
    }

    public function testGetName()
    {
        // Arrange
        // ...

        // Act
        $result = $this->device->getName();

        // Assert
        $this->assertEquals('name', $result);
    }

    public function testGetDescription()
    {
        // Arrange
        // ...

        // Act
        $result = $this->device->getDescription();

        // Assert
        $this->assertEquals('description', $result);
    }

    public function testGetUserAgent()
    {
        // Arrange
        // ...

        // Act
        $result = $this->device->getUserAgent();

        // Assert
        $this->assertEquals('userAgent', $result);
    }

    public function testGetActivationCodeWithEmptyCode()
    {
        // Arrange
        // ...

        // Act
        $result = $this->device->getActivationCode();

        // Assert
        $this->assertNull($result);
    }

    public function testSetGetActivationCode()
    {
        // Arrange
        $this->device->setActivationCode('12345');

        // Act
        $result = $this->device->getActivationCode();

        // Assert
        $this->assertEquals('12345', $result);
    }
}
