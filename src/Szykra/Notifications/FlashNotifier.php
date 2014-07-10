<?php namespace Szykra\Notifications;

use Illuminate\Session\Store;

class FlashNotifier {

    /**
     * @var Store
     */
    protected $session;

    /**
     * @var NotifyBuilder
     */
    protected $builder;

    /**
     * @var array
     */
    protected $notifies = [];

    /**
     * @param Store         $session
     * @param NotifyBuilder $builder
     */
    public function __construct(Store $session, NotifyBuilder $builder)
    {
        $this->session = $session;
        $this->builder = $builder;
    }

    /**
     * Set default alert
     *
     * @param        $message
     * @param string $level
     * @return $this
     */
    public function message($message, $level = 'info')
    {
        $this->notifies[] = ['title' => '', 'message' => $message, 'level' => $level];

        return $this;
    }

    /**
     * Set success alert
     *
     * @param $message
     * @return $this
     */
    public function success($message)
    {
        return $this->message($message, "success");
    }

    /**
     * Set warning alert
     *
     * @param $message
     * @return $this
     */
    public function warning($message)
    {
        return $this->message($message, "warning");
    }

    /**
     * Set error alert
     *
     * @param $message
     * @return $this
     */
    public function error($message)
    {
        return $this->message($message, "danger");
    }

    /**
     * Build all alerts and push to session
     */
    public function push()
    {
        foreach($this->notifies as $notify)
        {
            $alerts[] = $this->builder->build($notify['message'], ['level' => $notify['level']]);
        }

        $this->session->flash('flash.alert', implode('', $alerts));

        $this->notifies = [];
    }
} 