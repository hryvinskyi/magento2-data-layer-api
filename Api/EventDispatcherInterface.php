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
 * Routes an event built on the server by the store view's channel for it
 *
 * Events detected on the server (cart changes, checkout steps, wishlist, account, leads) go through it rather than
 * straight to the browser queue or a sink.
 *
 * @api
 */
interface EventDispatcherInterface
{
    /**
     * Route an event to the browser, the server, or both
     *
     * When the channel includes the browser, the event is queued for the visitor's browser (only inside a storefront
     * request). When it includes the server, every server event sink receives it with the given visitor, or with the
     * visitor of the current request when none is given.
     *
     * @param EventInterface $event
     * @param int $storeId The store view the event belongs to
     * @param VisitorContextInterface|null $visitor Who the event is about; null for the current request's visitor
     * @return void
     */
    public function dispatch(EventInterface $event, int $storeId, ?VisitorContextInterface $visitor = null): void;

    /**
     * Send an event from the server only
     *
     * Every server event sink receives the event and the key when the channel includes the server; the browser
     * queue is never touched. For events that exist only at order level (a purchase reported when the order is
     * placed or paid, a refund) and for events the browser posts to the server. Never throws.
     *
     * @param EventInterface $event
     * @param int $storeId The store view the event belongs to
     * @param VisitorContextInterface|null $visitor Who the event is about; null for the current request's visitor
     * @param string|null $deduplicationKey The business fact the event reports once, or null for none (see
     *     ServerEventSinkInterface::accept())
     * @return void
     */
    public function dispatchToServer(
        EventInterface $event,
        int $storeId,
        ?VisitorContextInterface $visitor = null,
        ?string $deduplicationKey = null
    ): void;
}
