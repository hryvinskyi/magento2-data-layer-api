<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api\Data;

/**
 * One GA4 item of an ecommerce event, immutable
 *
 * An item always carries a non-empty `item_id` or `item_name`, and every parameter name matches
 * `^[a-z][a-z0-9_]{0,39}$`. Prices are numbers rounded to two decimals.
 *
 * @api
 */
interface ItemInterface
{
    /**
     * Get the item's GA4 parameters
     *
     * Standard names: `item_id`, `item_name`, `price`, `quantity`, `index`, `item_brand`, `item_category` …
     * `item_category5`, `item_variant`, `item_list_id`, `item_list_name`, `discount`, `coupon`, `affiliation`; any
     * custom parameter (for example `custom_label_1`) may sit beside them.
     *
     * @return array<string, string|int|float> Keyed by GA4 parameter name
     */
    public function getParameters(): array;
}
