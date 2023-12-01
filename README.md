# INTRODUCTION

A Monolog processor to extract Pantheon environment details and add them to extra.

# Installation

Install with composer: `composer require middlebury/monolog-pantheon`

# Setup and Configuration

1. Add this library to your application (and Monolog) with composer.
2. Add this processor to your monolog service configuration:

        parameters:
          monolog.logger.processors: ['pantheon']

        services:
          monolog.processor.pantheon:
            class: Middlebury\MonologPantheon\Processor\PantheonProcessor

Your monolog log entries will now be have additional values from the Pantheon
environment added to them:

- `extra.pantheon_site_name`
- `extra.pantheon_site`
- `extra.pantheon_environment`
- `extra.pantheon_infrastructure_environment`
- `extra.pantheon_deployment_identifier`
