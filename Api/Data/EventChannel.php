<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api\Data;

/**
 * Where an event goes: pushed to `dataLayer` in the visitor's browser, sent from the server, or both
 *
 * Sending from the server means a Measurement Protocol call or a server-side Tag Manager, through a server event sink.
 * GA4 does not de-duplicate a browser event and a server event of the same action, so for GA4 the browser and the
 * server are alternatives; both exist for a server-side Tag Manager that forwards events to other platforms.
 *
 * @api
 */
enum EventChannel: string
{
    case Browser = 'browser';
    case Server = 'server';
    case Both = 'both';

    /**
     * Whether the event is pushed to `dataLayer` in the visitor's browser
     *
     * @return bool
     */
    public function includesBrowser(): bool
    {
        return $this !== self::Server;
    }

    /**
     * Whether the event is sent from the server
     *
     * @return bool
     */
    public function includesServer(): bool
    {
        return $this !== self::Browser;
    }
}
