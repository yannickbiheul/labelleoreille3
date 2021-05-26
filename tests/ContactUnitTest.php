<?php

namespace App\Tests;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $contact = new Contact;

        $contact->setEmail('email@test.com')
            ->setMessage('message')
            ->setNom('nom');

        $this->assertTrue($contact->getEmail() === 'email@test.com');
        $this->assertTrue($contact->getMessage() === 'message');
        $this->assertTrue($contact->getNom() === 'nom');
    }

    public function testIsFalse()
    {
        $contact = new Contact;

        $contact->setEmail('email@test.com')
            ->setMessage('message')
            ->setNom('nom');

        $this->assertFalse($contact->getEmail() === 'false');
        $this->assertFalse($contact->getMessage() === 'false');
        $this->assertFalse($contact->getNom() === 'false');
    }

    public function testIsEmpty()
    {
        $contact = new Contact;

        $this->assertEmpty($contact->getEmail());
        $this->assertEmpty($contact->getMessage());
        $this->assertEmpty($contact->getNom());
    }
    
}
