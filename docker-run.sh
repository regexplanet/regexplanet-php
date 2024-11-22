#!/usr/bin/env bash
#
# run locally but in docker

set -o errexit
set -o pipefail
set -o nounset

docker build -t regexplanet-php .
docker run \
	--publish 5000:5000 \
	--env PORT='5000' \
	--env COMMIT=$(git rev-parse --short HEAD) \
	--env LASTMOD=$(date -u +%Y-%m-%dT%H:%M:%SZ) \
	regexplanet-php
