<?php

namespace EclipseGc\CommonConsole\Event;

use Consolidation\Config\ConfigInterface;
use EclipseGc\CommonConsole\PlatformInterface;
use Symfony\Component\EventDispatcher\Event;

class PlatformWriteEvent extends Event {

  /**
   * @var \Consolidation\Config\ConfigInterface
   */
  protected $config;

  /**
   * @var bool
   */
  protected $success = FALSE;

  /**
   * PlatformWriteEvent constructor.
   *
   * @param \Consolidation\Config\ConfigInterface $config
   *   The configuration values to be written.
   */
  public function __construct(ConfigInterface $config) {
    $this->config = $config;
  }

  /**
   * Get the alias string for the platform.
   *
   * @return string
   */
  public function getAlias() : string {
    // @todo be better.
    return $this->config->get(PlatformInterface::PLATFORM_ALIAS_KEY);
  }

  /**
   * Get the configuration which will be written.
   *
   * @return \Consolidation\Config\ConfigInterface
   */
  public function getConfig() : ConfigInterface {
    return $this->config;
  }

  /**
   * Set the success of the write event.
   *
   * @param bool $value
   */
  public function isSuccessful(bool $value) {
    $this->success = $value;
  }

  /**
   * Whether or not the write was successful. Defaults to false.
   *
   * @return bool
   */
  public function success() : bool {
    return $this->success;
  }

}
