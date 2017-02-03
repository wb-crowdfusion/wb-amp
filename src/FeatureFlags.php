<?php

namespace Wb\Plugin\AmpPlugin;

final class FeatureFlags
{
    /**
     * Private constructor. This class is not meant to be instantiated.
     */
    private function __construct() {}

    /**
     * Determines if AMP (Accelerated Mobile Pages) feature is enabled.
     *
     * @var string
     */
    const AMP_ENABLED = 'wb:flag:articles:amp-enabled';

}
