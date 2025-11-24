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

rsync -az --checksum --delete --omit-dir-times --quiet "./_site/" "root@thatalexguy.dev:/var/www/thatalexguy.dev/"
ssh root@thatalexguy.dev -t 'sudo chown www-data:www-data /var/www/thatalexguy.dev/ -R'
echo "✅ Deployed"
