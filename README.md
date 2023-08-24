## Dependency inversion principl

The last and fifth principle says that a class depends on an abstraction and not on an implementation.

Let's exemplify.

```php
<?php
class Email
{
    public function send($message)
    {
        //logic
    }
}
```
```php
<?php

class Notificacao
{
    public function __construct()
    {
        $this->message = new Email;
    }

    public function enviar($message)
    {
        $this->message->send($message);
    }
}
```

In this example, we have what we call coupling and a dependency of the Notification class creates an instance of the Email class within it. And the send method makes use of the Email class to send the notification by email. This violates the dependency inversion principle, because we didn't develop the Notification class for an abstraction, but for an implementation, since the E-mail class implements the logic for sending the e-mail.

Let's settle this.

```php
<?php
interface MessageInterface
{
    public function send($message);
}
```
```php
<?php
class Email implements MessageInterface
{
    public function send($message)
    {
        //logic
    }
}
```
```php
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
```
Now we have detached the E-mail class from the Notification class, we are working with the MessageInterface abstraction, for Notification it doesn't matter which class you are using, but that it implements the MessageInterface interface because we know that it will have the send method that we need. This also allows the Notification class to use other classes that implement the MessageInterface interface.