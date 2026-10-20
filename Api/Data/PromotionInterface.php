<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api\Data;

/**
 * One promotion (a banner) as GA4 reports it in `view_promotion` and `select_promotion`
 *
 * @api
 */
interface PromotionInterface
{
    /**
     * Get the promotion id
     *
     * @return string
     */
    public function getPromotionId(): string;

    /**
     * Get the promotion name
     *
     * @return string
     */
    public function getPromotionName(): string;

    /**
     * Get the creative name
     *
     * @return string
     */
    public function getCreativeName(): string;

    /**
     * Get the creative slot
     *
     * @return string
     */
    public function getCreativeSlot(): string;

    /**
     * Get the location id
     *
     * @return string
     */
    public function getLocationId(): string;

    /**
     * Get the link the promotion opens, used to recognise a click on it
     *
     * @return string Empty when the promotion links nowhere
     */
    public function getTargetUrl(): string;

    /**
     * Get the GA4 promotion parameters
     *
     * Names are `promotion_id`, `promotion_name`, `creative_name`, `creative_slot` and `location_id`; a parameter
     * whose value is empty is left out.
     *
     * @return array<string, string>
     */
    public function toParameters(): array;
}
