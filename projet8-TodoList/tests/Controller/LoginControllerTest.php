<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function loginWithAdmin(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('login')->form();
        $this->client->submit($form, ['_username' => 'admin', '_password' => 'azerty']);
    }

    public function loginWithUser(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('login')->form();
        $this->client->submit($form, ['_username' => 'user', '_password' => 'azerty']);
    }
}
