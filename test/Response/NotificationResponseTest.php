<?php

namespace Test\Response;

use CurrencyFair\AppleId\Response\JwtVerifyResponse;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use stdClass;
use CurrencyFair\AppleId\Response\NotificationResponse;

class NotificationResponseTest extends MockeryTestCase
{
    /** @var stdClass */
    private $appleJwt;

    protected function setUp()
    {
        $this->appleJwt = json_decode(file_get_contents(__DIR__ . '/../data/appleNotificationDecoded.json'));
        parent::setUp();
    }

    public function testCorrectValuesReturned()
    {
        $jwtVerifyResponse = new NotificationResponse($this->appleJwt);

        $this->assertSame($this->appleJwt->aud, $jwtVerifyResponse->getAudience());
        $this->assertSame($this->appleJwt->iat, $jwtVerifyResponse->getIssuedAt());
        $this->assertSame($this->appleJwt->iss, $jwtVerifyResponse->getIssuer());
        $this->assertSame($this->appleJwt->events->email, $jwtVerifyResponse->getEmail());
        $this->assertSame($this->appleJwt->events->sub, $jwtVerifyResponse->getSubject());
        $this->assertSame($this->appleJwt->events->type, $jwtVerifyResponse->getType());
        $this->assertSame($this->appleJwt->events->event_time, $jwtVerifyResponse->getEventTime());
        $this->assertTrue($jwtVerifyResponse->getIsPrivateEmail());
    }
}
