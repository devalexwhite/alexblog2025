#!/bin/bash

header="---\ntags: mumbles\ndate: $(date -u +%Y-%m-%dT%H:%M:%SZ)\n---\n"

filename="./mumbles/mumble-$(date +%Y-%m-%dT%H-%M-%S).md"

echo -e $header > $filename

nano $filename

echo -e '\n\nPosting...\n\n'

./publish.sh

git add $filename
git commit -am "Adding mumble"
git push

echo -e '\n\nThanks for mumbling today.\n\n'
