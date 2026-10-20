<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Hryvinskyi\DataLayerApi\Api\Data\PromotionInterface;
use Magento\Catalog\Api\Data\ProductInterface;

/**
 * Renders the data script a list of products or promotions carries inside its own HTML
 *
 * The data travels with the block's markup, so it survives the block cache and the full-page cache; the browser turns
 * it into impressions and recognises clicks on the list.
 *
 * @api
 */
interface ListDataRendererInterface
{
    /**
     * Render the data script of a product list
     *
     * @param string $listId The GA4 `item_list_id`
     * @param string $listName The GA4 `item_list_name`
     * @param list<ProductInterface> $products In display order
     * @return string Empty when the list is empty, both `view_item_list` and `select_item` are disabled, a price in it
     *     is hidden from the viewer and the store skips such events, no item is built, or a modifier drops the
     *     `view_item_list` event
     */
    public function renderProductList(string $listId, string $listName, array $products): string;

    /**
     * Render the data script of a list of promotions
     *
     * @param list<PromotionInterface> $promotions In display order
     * @return string Empty when there are no promotions, both `view_promotion` and `select_promotion` are disabled,
     *     or a modifier drops every promotion's `view_promotion` event
     */
    public function renderPromotions(array $promotions): string;
}
