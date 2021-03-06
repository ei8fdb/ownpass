<?php
/**
 * This file is part of OwnPass. (https://github.com/ownpass/)
 *
 * @link https://github.com/ownpass/ownpass for the canonical source repository
 * @copyright Copyright (c) 2016-2017 OwnPass. (https://github.com/ownpass/)
 * @license https://raw.githubusercontent.com/ownpass/ownpass/master/LICENSE MIT
 */

namespace OwnPassNotesTest\V1\Rest\UserNote;

use OwnPassNotes\Entity\Note;
use OwnPassNotes\V1\Rest\UserNote\UserNoteCollection;
use OwnPassNotes\V1\Rest\UserNote\UserNoteEntity;
use OwnPassUser\Entity\Account;
use PHPUnit_Framework_TestCase;
use Zend\Paginator\Adapter\ArrayAdapter;

class UserNoteCollectionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers OwnPassNotes\V1\Rest\UserNote\UserNoteCollection::build
     */
    public function testBuild()
    {
        // Arrange
        $account = new Account('', '', '', '');

        $adapter = new ArrayAdapter([
            new Note($account),
        ]);

        $collection = new UserNoteCollection($adapter);

        // Act
        $result = $collection->getItem(0);

        // Assert
        $this->assertInstanceOf(UserNoteEntity::class, $result);
    }
}
