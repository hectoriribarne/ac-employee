#!/usr/bin/env bash

# NAME
#     script.sh - Run tests
#
# SYNOPSIS
#     script.sh
#
# DESCRIPTION
#     Runs static code analysis and automated tests.

cd "$(dirname "$0")"; source _includes.sh

# Restrict to the DEPLOY job.
[[ "$DEPLOY" ]] || exit 0

# Run tests.
phpunit \
  --colors=always \
  --debug \
  --configuration="${ORCA_FIXTURE_DOCROOT}/core/phpunit.xml.dist" \
  --group=orca_ignore \
  "${ORCA_FIXTURE_DOCROOT}/modules/contrib/acquia_contenthub"
