<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\SalesBundle\EventListener;

use PHPSpec2\ObjectBehavior;

/**
 * Order number listener spec.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class OrderNumberListener extends ObjectBehavior
{
    /**
     * @param Sylius\Bundle\SalesBundle\Generator\OrderNumberGeneratorInterface $generator
     */
    public function let($generator)
    {
        $this->beConstructedWith($generator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\SalesBundle\EventListener\OrderNumberListener');
    }

    /**
     * @param Sylius\Bundle\SalesBundle\Model\OrderInterface $order
     * @param Symfony\Component\EventDispatcher\GenericEvent $event
     */
    function it_generates_order_number($generator, $event, $order)
    {
        $event->getSubject()->willReturn($order);
        $generator->generate($order)->shouldBeCalled();

        $this->generateOrderNumber($event);
    }
}
