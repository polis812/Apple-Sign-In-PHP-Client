<?php

namespace Test\Response;

use CurrencyFair\AppleId\Response\JwtVerifyResponse;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use stdClass;
use CurrencyFair\AppleId\Response\NotificationResponse;

class NotificationRawResponseTest extends NotificationResponseTest
{
    /** @var stdClass */
    private $appleJwt;

    protected function setUp()
    {
        $this->appleJwt = json_decode(file_get_contents(__DIR__ . '/../data/appleNotificationRaw.json'));
        parent::setUp();
    }
}
