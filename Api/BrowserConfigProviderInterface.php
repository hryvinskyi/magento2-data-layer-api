<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

/**
 * Contributes one named part of the settings the page hands to the data layer's browser module
 *
 * The extension point for browser settings: a module adds its part (and, with a browser plugin of its own, the code
 * that reads it) without changing the data layer. The parts are printed into pages the full-page cache shares between
 * visitors, so a provider returns store-level data only — never anything about the visitor, the session or the cart.
 *
 * @api
 */
interface BrowserConfigProviderInterface
{
    /**
     * Get the name the part is printed under
     *
     * @return string Unique among the providers; a lower-case letter followed by letters and digits
     */
    public function getKey(): string;

    /**
     * Get the part for a store view
     *
     * @param int $storeId
     * @return array<string, scalar|array<mixed>|null> Empty when the store view has nothing to contribute; the part
     *      is then left out
     */
    public function provide(int $storeId): array;
}
