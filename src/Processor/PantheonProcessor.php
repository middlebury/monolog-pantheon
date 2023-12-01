<?php

declare(strict_types = 1);

namespace Middlebury\MonologPantheon\Processor;

use Monolog\LogRecord;
use Monolog\Processor\ProcessorInterface;

/**
 * Processor that adds Pantheon environmental details to the log entries.
 */
class PantheonProcessor implements ProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function __invoke(LogRecord $record): LogRecord {
    $pantheonExtra = [];
    $pantheonVars = [
      'PANTHEON_SITE_NAME',
      'PANTHEON_SITE',
      'PANTHEON_ENVIRONMENT',
      'PANTHEON_INFRASTRUCTURE_ENVIRONMENT',
      'PANTHEON_DEPLOYMENT_IDENTIFIER',
    ];
    foreach ($pantheonVars as $key) {
      if (isset($_ENV[$key])) {
        $pantheonExtra[strtolower($key)] = $_ENV[$key];
      }
    }
    $record->extra = array_merge($record->extra, $pantheonExtra);
    return $record;
  }

}
