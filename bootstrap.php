<?php

if (($this->isHotDeploy() || $this->isOneOffRedeploy()) && $this->objectExists('FlagsService')) {
    $this->object('FlagsService')->addFlag(\Wb\Plugin\AmpPlugin\FeatureFlags::IS_ENABLED, false);
}
