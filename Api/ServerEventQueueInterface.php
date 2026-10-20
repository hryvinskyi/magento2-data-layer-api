<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Hryvinskyi\DataLayerApi\Api\Data\EventInterface;

/**
 * Holds events detected on the server until the visitor's browser pushes them
 *
 * The queue belongs to the visitor's session; the browser is told that events wait and takes them after the action
 * that queued them, without reloading the page. Producers do not add to it directly: they hand events to the event
 * dispatcher, which queues an event only when its channel includes the browser.
 *
 * @api
 */
interface ServerEventQueueInterface
{
    /**
     * Queue an event for delivery to the visitor's browser
     *
     * Adding an event that is not enabled for the store view is the caller's mistake: check event availability
     * first.
     *
     * @param EventInterface $event
     * @return void
     */
    public function add(EventInterface $event): void;
}
