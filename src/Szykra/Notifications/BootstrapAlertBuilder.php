<?php namespace Szykra\Notifications;

class BootstrapAlertBuilder implements NotifyBuilder {

    public function build($message, $options)
    {
        $buffer = [];

        $buffer[] = "<div class='alert alert-{$options['level']}'>";
        $buffer[] = '<button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>';
        $buffer[] = $message;
        $buffer[] = "</div>";

        return implode("", $buffer);
    }

} 