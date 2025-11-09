#! /bin/bash

git add .
git commit -am "Publishing"
git push

npx @11ty/eleventy
cd _site
xmit thatalexguy.dev