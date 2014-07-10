<?php namespace Szykra\Notifications;

interface NotifyBuilder {

    public function build($message, $options);
}