---
title: It's Snowing!
tags: posts
layout: article.njk
date: 2025-12-04T12:08:01Z
---

![Snow falling on the homepage of this website](/posts/1ss/snow.webp)

In celebration of the snowy, wintery season I've transformed this site into a winter wonderland! Click the button at the top of any page to enable snow! 

Snow is opt-in so as not to cause performance issues on older hardware. 

Want to add snow to your own site? Just drop in the script from [my Github repo](https://github.com/devalexwhite/alexblog2025) for this blog. It's under `scripts/snow.js`. You'll also need to add a `<button id="toggle-snow">❄ Toggle Snow</button>` button somewhere in your layout to start the snow. 

The snow script uses a single Javascript file with a custom (very very barebones) particle effect. Each flake is given a downward velocity and can "drift" (randomly go left or right). The screen is bucketed to create "snow banks" so that snow can accumulate on the bottom of the display. The script will automatically create and remove an HTML Canvas element that covers the full display (with pointer events passing through).