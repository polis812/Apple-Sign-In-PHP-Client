<?php

namespace CurrencyFair\AppleId\Response;

use stdClass;

class NotificationResponse
{
    /** @var string */
    private $issuer;

    /** @var string */
    private $audience;

    /** @var string */
    private $issuedAt;

    /** @var string */
    private $type;

    /** @var string */
    private $subject;

    /** @var string|null */
    private $email;

    /** @var bool|null */
    private $isPrivateEmail;

    /** @var string */
    private $eventTime;

    public function __construct(stdClass $response)
    {
        $this->issuer = isset($response->iss) ? $response->iss : null;
        $this->audience = isset($response->aud) ? $response->aud : null;
        $this->issuedAt = isset($response->iat) ? $response->iat : null;

        $this->type = isset($response->events->type) ? $response->events->type : null;
        $this->subject = isset($response->events->sub) ? $response->events->sub : null;
        $this->email = isset($response->events->email) ? $response->events->email : null;
        $this->isPrivateEmail = isset($response->events->is_private_email) ? $response->events->is_private_email : null;
        $this->eventTime = isset($response->events->event_time) ? $response->events->event_time : null;
    }

    /**
     * @return string|null
     */
    public function getIssuer(): ?string
    {
        return $this->issuer;
    }

    /**
     * @return string|null
     */
    public function getAudience(): ?string
    {
        return $this->audience;
    }

    /**
     * @return string|null
     */
    public function getIssuedAt(): ?string
    {
        return $this->issuedAt;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return bool|null
     */
    public function getIsPrivateEmail(): ?bool
    {
        return $this->isPrivateEmail;
    }

    /**
     * @return string
     */
    public function getEventTime(): string
    {
        return $this->eventTime;
    }
}
