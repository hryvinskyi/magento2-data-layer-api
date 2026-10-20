<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Magento\Quote\Api\Data\CartInterface;

/**
 * Tells whether the events of a cart are reported
 *
 * A cart a rule refuses produces no cart events at all. Modules contribute their own rule; the data layer composes
 * every contribution, and a cart is tracked only when every contribution says so. A cart that is not a shopping cart
 * but reports events of its own instead is not refused here: its module registers it as a cart kind.
 *
 * @see CartKindInterface
 *
 * @api
 */
interface CartTrackingPolicyInterface
{
    /**
     * Whether the events of the cart are reported
     *
     * @param CartInterface $cart
     * @return bool
     */
    public function isTracked(CartInterface $cart): bool;
}
