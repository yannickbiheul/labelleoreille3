<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserUnitTest extends TestCase
{

    public function testIsTrue()
    {
        $user = new User;

        $user->setEmail('email@test.com')
            ->setNom('nom')
            ->setPrenom('prenom')
            ->setPassword('password');

        $this->assertTrue($user->getEmail() === 'email@test.com');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getPassword() === 'password');
    }

    public function testIsFalse()
    {
        $user = new User;

        $user->setEmail('email@test.com')
            ->setNom('nom')
            ->setPrenom('prenom')
            ->setPassword('password');

        $this->assertFalse($user->getEmail() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
    }

    public function testIsEmpty()
    {
        $user = new User;

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getNom());
        $this->assertEmpty($user->getPrenom());
        $this->assertEmpty($user->getPassword());
    }
}
