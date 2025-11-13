#!/bin/bash

header="---\ntags: mumbles\ndate: $(date -u +%Y-%m-%dT%H:%M:%SZ)\n---\n"

filename="./mumbles/mumble-$(date +%Y-%m-%dT%H-%M-%S).md"

INSTANCE_URL="https://fosstodon.org"

nano $filename

TOOT=$(cat $filename)

echo -e '\nTooting...\n\n'

curl ${INSTANCE_URL}/api/v1/statuses -H "Authorization: Bearer $MASTODON_TOKEN" -F "status=${TOOT}"

sed -i "1s;^;$header;" "$filename"

echo -e '\nMumbling...\n\n'

./publish.sh

echo -e '\n\nThanks for mumbling (& tooting) today.\n\n'
