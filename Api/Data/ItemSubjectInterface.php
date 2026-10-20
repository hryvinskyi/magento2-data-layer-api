<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api\Data;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Quote\Api\Data\CartItemInterface;
use Magento\Sales\Api\Data\OrderItemInterface;

/**
 * What one GA4 item is built from
 *
 * The catalogue product the shopper sees, optionally the chosen child, the cart or order line it comes from (at most
 * one of the two), the quantity, the position in a list, and the store view the item is reported for.
 *
 * @api
 */
interface ItemSubjectInterface
{
    /**
     * Get the catalogue product the shopper sees
     *
     * For a configurable line this is the parent product, not the chosen simple.
     *
     * @return ProductInterface
     */
    public function getProduct(): ProductInterface;

    /**
     * Get the chosen child product of a configurable or bundle line
     *
     * @return ProductInterface|null Null for any other line, and when no line is involved
     */
    public function getChildProduct(): ?ProductInterface;

    /**
     * Get the cart line the item comes from
     *
     * @return CartItemInterface|null Null when the item does not come from a cart; never set together with an
     *     order line
     */
    public function getQuoteItem(): ?CartItemInterface;

    /**
     * Get the order line the item comes from
     *
     * @return OrderItemInterface|null Null when the item does not come from an order; never set together with a
     *     cart line
     */
    public function getOrderItem(): ?OrderItemInterface;

    /**
     * Get the quantity reported for the item
     *
     * @return float
     */
    public function getQuantity(): float;

    /**
     * Get the id of the list the item is shown in
     *
     * @return string|null Null when the item is not shown in a list
     */
    public function getListId(): ?string;

    /**
     * Get the name of the list the item is shown in
     *
     * @return string|null Null when the item is not shown in a list
     */
    public function getListName(): ?string;

    /**
     * Get the item's position in the list it is shown in
     *
     * @return int|null Null when the item is not shown in a list
     */
    public function getIndex(): ?int;

    /**
     * Get the store view the item is reported for
     *
     * @return int
     */
    public function getStoreId(): int;
}
