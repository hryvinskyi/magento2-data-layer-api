<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Magento\Catalog\Api\Data\ProductInterface;

/**
 * Tells whether the current viewer may see a product's price
 *
 * Modules contribute their own rule; the data layer composes every contribution, and a price is visible only when
 * every contribution says so.
 *
 * @api
 */
interface PriceVisibilityInterface
{
    /**
     * Whether the current viewer may see the product's price
     *
     * @param ProductInterface $product
     * @return bool
     */
    public function isPriceVisible(ProductInterface $product): bool;
}
