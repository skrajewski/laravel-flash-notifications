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
     * @param Store         $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }


    /**
     * Set information alert
     *
     * @internal param $title
     * @internal param $message
     * @return $this
     */
    public function info()
    {
        return $this->message(func_get_args(), "info");
    }

    /**
     * Set success alert
     *
     * @internal param $title
     * @internal param $message
     * @return $this
     */
    public function success()
    {
        return $this->message(func_get_args(), "success");
    }

    /**
     * Set warning alert
     *
     * @internal param $title
     * @internal param $message
     * @return $this
     */
    public function warning()
    {
        return $this->message(func_get_args(), "warning");
    }

    /**
     * Set error alert
     *
     * @internal param $title
     * @internal param $message
     * @return $this
     */
    public function error()
    {
        return $this->message(func_get_args(), "danger");
    }

    /**
     * Build all alerts and push to session
     */
    public function push()
    {
        $this->session->flash('flash.alerts', $this->notifies);

        $this->notifies = [];
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
        }

        $this->notifies[] = ['title'   => $title, 'message' => $message, 'level'   => $level];

        return $this;
    }
} 