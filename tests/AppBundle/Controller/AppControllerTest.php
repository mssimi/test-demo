<?php declare(strict_types = 1);

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppControllerTest extends WebTestCase
{
    public function testIndex() : void
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testContact() : void
    {
        $client = static::createClient();
        $client->followRedirects();

        $crawler = $client->request('GET', '/contact');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $buttonCrawlerNode = $crawler->selectButton('Send');
        $form = $buttonCrawlerNode->form();
        $form->setValues(array(
            'contact[email]' => 'mongomary@able.cz',
            'contact[name]' => 'Martin Mongomary',
            'contact[phone]' => '112567112567', // tak zavolej me do klubu
            'contact[msg]' => 'Lorem rohlikum'
        ));

        $crawler = $client->submit($form);
        $this->assertEquals('Question send!', trim($crawler->filter('.alert-success')->text()));
    }

    public function testProduct() : void
    {
        $client = static::createClient();

        $crawler = $client->request('GET','/product/okurka');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertEquals('okurka', trim($crawler->filter('h1')->text()));
    }
}
