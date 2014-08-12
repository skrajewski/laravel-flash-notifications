<?php

namespace spec\Szykra\Notifications;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Session\Store;

class FlashNotifierSpec extends ObjectBehavior
{
	function let(Store $session)
	{
		$this->beConstructedWith($session);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Szykra\Notifications\FlashNotifier');
    }

    function it_should_throw_exception_when_provide_more_than_two_parameters()
    {
    	$this->shouldThrow('\InvalidArgumentException')->duringInfo("Dummy title", "Dummy message", "I have no idea what it is...");	
    }

    function it_should_set_flash_to_session_store(Store $session)
    {
    	$session->flash('flash.alerts', [['title' => '', 'message' => 'Test message', 'level' => 'info']])->shouldBeCalled();

    	$this->info('Test message');
    }
}
