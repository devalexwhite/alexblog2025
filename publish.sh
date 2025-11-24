#! /bin/bash

echo "⸙ Commiting to git"

git add .
git commit -am "Publishing"
git push

echo "👷🏼‍♂️ Building"

npx @11ty/eleventy
#cd _site
#xmit thatalexguy.dev

echo "⛾ Deploying, grab a coffee"

rsync -az --checksum --omit-dir-times --quiet "./_site/" "root@159.89.45.162:/var/www/thatalexguy.dev/"

echo "✅ Deployed"
