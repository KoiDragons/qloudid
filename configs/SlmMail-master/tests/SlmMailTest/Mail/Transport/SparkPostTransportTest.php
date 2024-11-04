<?php

namespace SlmMail\Mail\Transport;

use PHPUnit\Framework\TestCase;
use SlmMailTest\Util\ServiceManagerFactory;
use Laminas\Mail\Message;

class SparkPostTransportTest extends TestCase
{
    public function testCreateFromFactory()
    {
        $transport = ServiceManagerFactory::getServiceManager()->get('SlmMail\Mail\Transport\SparkPostTransport');

        $this->assertInstanceOf('SlmMail\Mail\Transport\HttpTransport', $transport);

        $property = new \ReflectionProperty('SlmMail\Mail\Transport\HttpTransport', 'service');
        $property->setAccessible(true);

        $this->assertInstanceOf('SlmMail\Service\SparkPostService', $property->getValue($transport));
    }

    public function testTransportUsesSparkPostService()
    {
        $service   = $this->createMock('SlmMail\Service\SparkPostService', [], ['my-secret-key']);
        $transport = new HttpTransport($service);
        $message   = new Message();

        $service->expects($this->once())
                ->method('send')
                ->with($this->equalTo($message));

        $transport->send($message);
    }
}
