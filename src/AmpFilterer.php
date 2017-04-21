<?php

namespace Wb\Plugin\AmpPlugin;

/**
 * Class AmpFilterer
 */
class AmpFilterer extends \AbstractFilterer
{
    /**
     * @var \FlagsService
     */
    protected $FlagsService;

    /**
     * @param \FlagsService $FlagsService
     */
    public function setFlagsService(\FlagsService $FlagsService)
    {
        $this->FlagsService = $FlagsService;
    }

    /**
     * Returns true or false if the amp plugin is turned off.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->FlagsService->getFlag(FeatureFlags::IS_ENABLED);
    }

    /**
     * Returns true or false if node can render html.
     *
     * Requirements:
     * - The plugin must be turned on.
     * - Node must have the `#amp-enabled` meta flagged true. Pass to this method via ?amp=Data:#amp-enabled or boolean.
     *
     * @return boolean
     */
    public function canRenderHtml()
    {
        if (!$this->isEnabled()) {
            return false;
        }

        $param = $this->getParameter('enabled');

        if ($param instanceof \Meta) {
            /** @type $param \Meta */
            $val = $param->getValue();
        } else {
            $val = $param;
        }

        return filter_var($val, FILTER_VALIDATE_BOOLEAN);
    }

}
