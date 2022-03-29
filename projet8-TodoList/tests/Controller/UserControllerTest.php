<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{

    private $client;

    protected function setUp(): void
    {
        $this->client = self::createClient();
    }

    public function loginWithAdmin(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('login')->form();
        $this->client->submit($form, ['_username' => 'admin', '_password' => 'azerty']);
    }

    public function testListAction(): void
    {
        $this->loginWithAdmin();

        $this->client->request('GET', '/user/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreateAction(): void
    {
        $this->loginWithAdmin();

        $crawler = $this->client->request('GET', '/register');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame('Nom d\'utilisateur', $crawler->filter('label[for="registration_form_username"]')->text());
        $this->assertSame('Mot de passe', $crawler->filter('label[for="registration_form_password_first"]')->text());
        $this->assertSame('Adresse email', $crawler->filter('label[for="registration_form_email"]')->text());

        $this->assertEquals(1, $crawler->filter('input[name="registration_form[username]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="registration_form[password][first]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="registration_form[password][second]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="registration_form[email]"]')->count());
        $this->assertEquals(2, $crawler->filter('input[name="registration_form[roles][]"]')->count());

        $form = $crawler->selectButton('Ajouter')->form();
        $form['registration_form[username]'] = 'testUser'.rand();
        $form['registration_form[password][first]'] = 'azerty';
        $form['registration_form[password][second]'] = 'azerty';
        $form['registration_form[email]'] = 'newUser'.rand().'@example.org';
        $form['registration_form[roles][0]']->tick();
        $this->client->submit($form);

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

    }

    public function testEditeAction(): void
    {
        $this->loginWithAdmin();

        $crawler = $this->client->request('GET', '/user/47/edit');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame('Nom d\'utilisateur', $crawler->filter('label[for="user_username"]')->text());
        $this->assertSame('Adresse email', $crawler->filter('label[for="user_email"]')->text());

        $this->assertEquals(1, $crawler->filter('input[name="user[username]"]')->count());
        $this->assertEquals(1, $crawler->filter('input[name="user[email]"]')->count());
        $this->assertEquals(2, $crawler->filter('input[name="user[roles][]"]')->count());

        $form = $crawler->selectButton('Modifier')->form();
        $form['user[username]'] = 'user'.rand();
        $form['user[email]'] = 'newUser'.rand().'@example.org';
        $form['user[roles][0]']->tick();
        $this->client->submit($form);

        $this->assertEquals(303, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

    }


}