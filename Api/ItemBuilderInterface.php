<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Hryvinskyi\DataLayerApi\Api\Data\ItemInterface;
use Hryvinskyi\DataLayerApi\Api\Data\ItemSubjectInterface;

/**
 * Builds the GA4 items of one event through the data layer's item pipeline
 *
 * For modules that build an event of their own and want its items filled the way every other event's are.
 *
 * @api
 */
interface ItemBuilderInterface
{
    /**
     * Build the items of an event from their subjects
     *
     * @param list<ItemSubjectInterface> $subjects
     * @param string $eventName The GA4 event the items are built for
     * @return list<ItemInterface>
     */
    public function build(array $subjects, string $eventName): array;
}
