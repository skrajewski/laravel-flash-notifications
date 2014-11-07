<?php namespace Szykra\Notifications;

use Illuminate\Session\Store;

class FlashNotifier {

    /**
     * @var Store
     */
    protected $session;

    /**
     * @var array
     */
    protected $notifies = [];

    /**
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Set information alert
     *
     * @return $this
     */
    public function info()
    {
        return $this->message(func_get_args(), "info");
    }

    /**
     * Set success alert
     *
     * @return $this
     */
    public function success()
    {
        return $this->message(func_get_args(), "success");
    }

    /**
     * Set warning alert
     *
     * @return $this
     */
    public function warning()
    {
        return $this->message(func_get_args(), "warning");
    }

    /**
     * Set error alert
     *
     * @return $this
     */
    public function error()
    {
        return $this->message(func_get_args(), "danger");
    }

    /**
     * Push notifies array to session
     */
    protected function push()
    {
        $this->session->flash('flash.alerts', $this->notifies);
    }

    /**
     * Expand $args and set alert to notify table
     *
     * @param $args
     * @param $level
     * @return $this
     */
    protected function message($args, $level)
    {
        switch(count($args))
        {
            case 2:
                $title = $args[0];
                $message = $args[1];
                break;
            case 1:
                $title = '';
                $message = $args[0];
                break;
            default:
                throw new \InvalidArgumentException('Cannot resolve arguments. Please provide one parameter as `message` or two parameters as `title` and `message`.');
        }

        $this->notifies[] = ['title' => $title, 'message' => $message, 'level' => $level];

        $this->push();

        return $this;
    }

}
