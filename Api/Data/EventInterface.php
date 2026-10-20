<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api\Data;

/**
 * One GA4 event, immutable
 *
 * The event name matches `^[a-z][a-z0-9_]{0,39}$`. An ecommerce event carries its parameters and items under the
 * `ecommerce` key of the data layer object; any other event (`login`, `sign_up`, `generate_lead`) carries its
 * parameters at the top level.
 *
 * @api
 */
interface EventInterface
{
    /**
     * Get the GA4 event name
     *
     * @return string Matches `^[a-z][a-z0-9_]{0,39}$`
     */
    public function getName(): string;

    /**
     * Whether the parameters and items go under `ecommerce` in the data layer
     *
     * True for the GA4 ecommerce events; false for events such as `login`, `sign_up` and `generate_lead`, whose
     * parameters sit at the top level of the pushed object.
     *
     * @return bool
     */
    public function isEcommerce(): bool;

    /**
     * Get the event-level parameters
     *
     * For example `currency`, `value`, `transaction_id`, `tax`, `shipping`, `coupon`, `payment_type`,
     * `shipping_tier`, `item_list_id`, `item_list_name`, `method`.
     *
     * @return array<string, string|int|float|bool> Keyed by GA4 parameter name
     */
    public function getParameters(): array;

    /**
     * Get the event's items, in the order they are reported
     *
     * @return list<ItemInterface>
     */
    public function getItems(): array;

    /**
     * Get the object pushed to `dataLayer` for this event
     *
     * An ecommerce event gives `['event' => name, 'ecommerce' => parameters + ['items' => item parameter maps]]`,
     * with no `items` key when the event has no items; any other event gives `['event' => name] + parameters`.
     *
     * @return array<string, scalar|array<string, scalar|list<array<string, scalar>>>>
     */
    public function toDataLayer(): array;
}
