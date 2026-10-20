<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

/**
 * Tells whether an event is reported in a store view
 *
 * Callers ask before doing any work for an event: a disabled event is never built.
 *
 * @api
 */
interface EventAvailabilityInterface
{
    /**
     * Whether the data layer is on for the store view and the event is not among the store's disabled events
     *
     * @param string $eventName The GA4 event name
     * @param int|null $storeId The store view; null for the current one
     * @return bool
     */
    public function isEnabled(string $eventName, ?int $storeId = null): bool;
}
