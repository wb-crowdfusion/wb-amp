<?php

use \Wb\Plugin\AmpPlugin\FeatureFlags;

/**
 * Class AmpFilterer
 */
class AmpFilterer extends AbstractFilterer
{
    /**
     * @var FlagsService
     */
    protected $FlagsService;

    /**
     * @param FlagsService $FlagsService
     */
    public function setFlagsService(FlagsService $FlagsService) {
        $this->FlagsService = $FlagsService;
    }

    /**
     * Returns true or false if the amp plugin is turned off.
     *
     * @return boolean
     */
    public function isEnabled() {
        return $this->FlagsService->getFlag(FeatureFlags::IS_ENABLED);
    }

    /**
     * Returns true or false if node can render html.
     *
     * Requirements:
     * - The plugin must be turned on.
     * - Node must have the #syndication-amp meta flagged true. Pass to this method via ?amp=Data:#amp-enabled
     *
     * @return boolean
     */
    public function canRenderHtml() {
        if (!$this->isEnabled()) {
            return false;
        }

        /* @var $ampMeta Meta */
        $ampMeta = $this->getParameter('enabled');

        if (!$ampMeta || !$ampMeta->getValue()) {
            return false;
        }

        return true;
    }

}
