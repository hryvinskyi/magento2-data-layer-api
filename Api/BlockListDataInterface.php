<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Magento\Framework\View\Element\AbstractBlock;

/**
 * Appends list data to the HTML of a block that may be served from the block cache
 *
 * A block saves its cached HTML before after-plugins run, so data an after-plugin appends is not part of a cache
 * hit. This keeps the rendered data in a cache entry of its own beside the block's.
 *
 * @api
 */
interface BlockListDataInterface
{
    /**
     * Append the block's list data to its HTML
     *
     * When the block cache type is enabled and the block carries a `cache_lifetime` in its data, the rendered data is
     * cached under a key derived from the block's `getCacheKey()`, with the block's tags (the block cache group, its
     * `cache_tags` data and, when the block exposes them, its identities) and its lifetime, and $render is called
     * only on a miss. For any other block, and for a block whose cache key cannot be computed, $render is always
     * called.
     *
     * @param AbstractBlock $block The block whose HTML is being rendered
     * @param string $html The block's HTML
     * @param callable $render Produces the list data script
     * @phpstan-param callable(): string $render
     * @return string $html with the list data appended
     */
    public function append(AbstractBlock $block, string $html, callable $render): string;
}
