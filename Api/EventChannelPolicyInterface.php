<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Hryvinskyi\DataLayerApi\Api\Data\EventChannel;

/**
 * Tells where a store view routes an event: the browser, the server, or both
 *
 * @api
 */
interface EventChannelPolicyInterface
{
    /**
     * Get the store view's channel for the event
     *
     * @param string $eventName The GA4 event name
     * @param int|null $storeId The store view; null for the current one
     * @return EventChannel The browser for an event the store has not routed
     */
    public function channelOf(string $eventName, ?int $storeId = null): EventChannel;
}
