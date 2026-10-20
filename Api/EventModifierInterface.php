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
 * Changes or drops an event before it is delivered
 *
 * Every modifier is applied to every event, in the `sortOrder` of its item in the `di.xml` array (Magento's object
 * manager sorts array items by that attribute; items without one keep merge order, which follows module sequence).
 * A dropped event reaches no later modifier.
 *
 * @api
 */
interface EventModifierInterface
{
    /**
     * Modify an event
     *
     * @param EventInterface $event
     * @return EventInterface|null The same event unchanged, a replacement, or null to drop it
     */
    public function modify(EventInterface $event): ?EventInterface;
}
