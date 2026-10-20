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
 * A kind of cart that is not a shopping cart and reports its own events in place of a shopping cart's
 *
 * A module that keeps carts of its own (a request-for-quote cart, for example) registers its kind with the data layer.
 * A cart of that kind reports, for each event a shopping cart reports, the event its kind names instead, or nothing:
 * units added to one of its lines can be reported as an event of the kind's own, while the checkout steps a cart of
 * that kind never goes through are not reported for it. A cart no registered kind recognises is a shopping cart and
 * reports the shopping cart's events.
 *
 * @api
 */
interface CartKindInterface
{
    /**
     * Whether the cart is of this kind
     *
     * @param CartInterface $cart
     * @return bool
     */
    public function isKindOf(CartInterface $cart): bool;

    /**
     * Get the event a cart of this kind reports in place of a shopping cart's event
     *
     * @param string $cartEvent The event a shopping cart reports (`add_to_cart`, `remove_from_cart`, `view_cart`,
     *     `begin_checkout`, `add_shipping_info`, `add_payment_info`)
     * @return string|null The GA4 name of the kind's own event; null when a cart of this kind reports no such event
     */
    public function eventFor(string $cartEvent): ?string;
}
