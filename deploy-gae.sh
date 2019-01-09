#!/bin/bash
#
# deploy php engine to Google AppEngine
#

set -o errexit
set -o pipefail
set -o nounset

YAML=./app.yaml
yq write --inplace $YAML env_variables.COMMIT $(git rev-parse --short HEAD)
yq write --inplace $YAML env_variables.LASTMOD $(date -u +%Y-%m-%dT%H:%M:%SZ)

/usr/local/google_appengine/appcfg.py --oauth2 update .

#
# restore committed values
#
yq write --inplace $YAML env_variables.COMMIT dev
yq write --inplace $YAML env_variables.LASTMOD dev



