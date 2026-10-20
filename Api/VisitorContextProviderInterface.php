<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Hryvinskyi\DataLayerApi\Api\Data\VisitorContextInterface;
use Magento\Sales\Api\Data\OrderInterface;

/**
 * Tells who the visitor behind an event is
 *
 * @api
 */
interface VisitorContextProviderInterface
{
    /**
     * Get the visitor of the current storefront request, read from its cookies and user agent
     *
     * @return VisitorContextInterface|null Null outside a storefront request (admin, cron, command line)
     */
    public function current(): ?VisitorContextInterface;

    /**
     * Get the visitor stored for an order, copied from its cart when the order was placed
     *
     * The returned context happened now, at the moment the caller reports something about the order, never at the
     * stored time: Measurement Protocol drops events dated more than 72 hours back, and a payment or a refund can
     * come days after the order.
     *
     * @param OrderInterface $order
     * @return VisitorContextInterface|null Null when no visitor was stored for the order
     */
    public function forOrder(OrderInterface $order): ?VisitorContextInterface;
}
