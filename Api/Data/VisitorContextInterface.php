<?php
/**
 * Copyright (c) 2026. Volodymyr Hryvinskyi. All rights reserved.
 * Author: Volodymyr Hryvinskyi <volodymyr@hryvinskyi.com>
 * GitHub: https://github.com/hryvinskyi
 */

declare(strict_types=1);

namespace Hryvinskyi\DataLayerApi\Api\Data;

/**
 * Who an event is about, as far as the server can tell, and when it happened
 *
 * @api
 */
interface VisitorContextInterface
{
    /**
     * Get the analytics client id of the visitor's browser
     *
     * @return string|null Null when it is not known
     */
    public function getClientId(): ?string;

    /**
     * Get the analytics session id the event belongs to
     *
     * @return string|null Null when it is not known
     */
    public function getSessionId(): ?string;

    /**
     * Get the signed-in customer's user id as reported to analytics
     *
     * @return string|null Null for a guest
     */
    public function getUserId(): ?string;

    /**
     * Get the advertising click ids the visit carries
     *
     * @return array<string, string> Keyed by the click id's name, for example `gclid`
     */
    public function getClickIds(): array;

    /**
     * Get the visitor's browser user agent
     *
     * @return string|null Null when it is not known
     */
    public function getUserAgent(): ?string;

    /**
     * Get the URL of the page the event happened on
     *
     * @return string|null Null when it is not known
     */
    public function getPageLocation(): ?string;

    /**
     * Get the referrer of the page the event happened on
     *
     * @return string|null Null when it is not known
     */
    public function getPageReferrer(): ?string;

    /**
     * Get the moment the event happened
     *
     * @return \DateTimeImmutable
     */
    public function getOccurredAt(): \DateTimeImmutable;
}
