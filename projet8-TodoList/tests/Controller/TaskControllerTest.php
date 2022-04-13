<?php


namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TaskControllerTest extends WebTestCase
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

    public function loginWithUser(): void
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('login')->form();
        $this->client->submit($form, ['_username' => 'user', '_password' => 'azerty']);
    }

    public function testList(): void
    {
        $this->loginWithUser();
        $this->client->request('GET', '/task/');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCreate(): void
    {
        $this->loginWithUser();

        $crawler = $this->client->request('GET', '/task/new');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertEquals(1, $crawler->filter('input[name="task[title]"]')->count());
        $this->assertEquals(1, $crawler->filter('textarea[name="task[content]"]')->count());

        $form = $crawler->selectButton('Save')->form();
        $form['task[title]'] = 'Test '.rand().' Super titre de tache';
        $form['task[content]'] = 'Test Contenu de la supertache blablabla.';
        $this->client->submit($form);

        $this->assertEquals(303, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

    }


    public function testEdit(): void
    {
        $this->loginWithAdmin();

        $crawler = $this->client->request('GET', '/task/5/edit');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame('Title', $crawler->filter('label[for="task_title"]')->text());
        $this->assertEquals(1, $crawler->filter('input[name="task[title]"]')->count());
        $this->assertSame('Content', $crawler->filter('label[for="task_content"]')->text());
        $this->assertEquals(1, $crawler->filter('textarea[name="task[content]"]')->count());

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'Test modification du Super titre de tache';
        $form['task[content]'] = 'Test modification du contenu de la supertache blablabla.';
        $this->client->submit($form);

        $this->assertEquals(303, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

    }

    public function testToggleTask(): void
    {
        $this->loginWithUser();

        $this->client->request('GET', '/task/tasks/18/toggle?');

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertEquals(1, $crawler->filter('div.alert-success')->count());

    }

    public function testDeleteTask(): void
    {
        $this->loginWithUser();

        $this->client->request('POST', '/task/18/delete');

        $this->assertEquals(303, $this->client->getResponse()->getStatusCode());

        $crawler = $this->client->followRedirect();

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

    }
}