<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api;

use Hryvinskyi\DataLayerApi\Api\Data\ItemSubjectInterface;

/**
 * Contributes GA4 item parameters for all items of one event at once
 *
 * The extension point that fills items. A provider is called once per event with every subject of that event, and
 * reads what it needs for all of them together (one query per concern), never once per subject.
 *
 * @api
 */
interface ItemFieldProviderInterface
{
    /**
     * Get this provider's item parameters for every subject of an event
     *
     * @param array<int,ItemSubjectInterface> $subjects
     * @param string $eventName The GA4 event the items are built for
     * @return array<int, array<string, string|int|float>> Keyed exactly like $subjects; a subject the provider has
     *     nothing for is left out
     */
    public function provide(array $subjects, string $eventName): array;
}
