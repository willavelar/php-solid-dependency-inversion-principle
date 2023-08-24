<?php
class Notification
{
    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    public function send($message)
    {
        $this->message->send($message);
    }
}