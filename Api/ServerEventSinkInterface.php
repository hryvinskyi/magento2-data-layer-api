<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Hryvinskyi\DataLayerApi\Api\Data\EventInterface;
use Hryvinskyi\DataLayerApi\Api\Data\VisitorContextInterface;

/**
 * Takes events to be sent from the server
 *
 * The extension point for server-side delivery. A sink never waits on the network inside the shopper's request: it
 * persists the event and delivers it later. A sink never throws: it logs every failure, because its callers include
 * observers inside order placement, where an exception would fail the shopper's checkout after the order exists.
 *
 * @api
 */
interface ServerEventSinkInterface
{
    /**
     * Take an event for delivery from the server
     *
     * A de-duplication key names the business fact the event reports once (`purchase:<order id>`,
     * `refund:<credit memo id>`, `collect:<client id>:<browser event id>`); a sink delivers at most one event per
     * key. Without a key there is no de-duplication: two identical events (the same product added to the cart twice)
     * are two real actions and both are delivered.
     *
     * @param EventInterface $event
     * @param int $storeId The store view the event belongs to
     * @param VisitorContextInterface|null $visitor Who the event is about; null when nobody is known
     * @param string|null $deduplicationKey The business fact reported once, or null for none
     * @return void
     */
    public function accept(
        EventInterface $event,
        int $storeId,
        ?VisitorContextInterface $visitor,
        ?string $deduplicationKey = null
    ): void;
}
