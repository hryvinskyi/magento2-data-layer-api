<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Test\Unit\Api\Data;

use Hryvinskyi\DataLayerApi\Api\Data\EventChannel;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * A channel decides whether an event reaches the browser's data layer, the server, or both; and channels are stored
 * in settings by their string values
 */
class EventChannelTest extends TestCase
{
    /**
     * The channel stored in settings under each value reaches exactly the destinations it names
     *
     * @dataProvider destinations
     * @param string $value The value stored in settings
     * @param bool $browser Whether the channel reaches the browser
     * @param bool $server Whether the channel reaches the server
     * @return void
     */
    #[DataProvider('destinations')]
    public function testStoredChannelReachesTheDestinationsItNames(string $value, bool $browser, bool $server): void
    {
        $channel = EventChannel::from($value);

        self::assertSame($browser, $channel->includesBrowser());
        self::assertSame($server, $channel->includesServer());
    }

    /**
     * Every channel is found again from its stored value
     *
     * @return void
     */
    public function testEveryChannelRoundTripsThroughItsValue(): void
    {
        foreach (EventChannel::cases() as $channel) {
            self::assertSame($channel, EventChannel::from($channel->value));
        }
    }

    /**
     * Every stored channel value with the destinations it reaches
     *
     * @return array<string, array{string, bool, bool}>
     */
    public static function destinations(): array
    {
        return [
            'browser only' => ['browser', true, false],
            'server only' => ['server', false, true],
            'both' => ['both', true, true],
        ];
    }
}
