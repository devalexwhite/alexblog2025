---
title: Personal Software
tags: posts
layout: article.njk
date: 2025-09-14
---

The past week we've been visiting family out of state, getting away from
the city and spending time in the peaceful Virginia countryside. It's
been incredibly relaxing to get away from it all. I've been spending
every morning and evening outside, listening to the birds and crickets,
watching the deer frolic by and the squirrels prep for winter. It's been
wonderful, except for one small thing, my 3 year old has had the hardest
time adjusting to sleeping here.

To help coax my son to sleep, my wife has been playing white noise and
shushing sounds. She wanted to play them both, and was using two phones
to do so (each with a video of the respective sound playing in the
background). At home we have a fan based white noise machine, but we
forgot to bring it. The videos she finds sometimes have obnoxious
intros, or end at the most worst possible time. After the third time
putting him to sleep like this, I decided to build a solution once he
went down for his nap.

## Building a Sleep Tool

I grabbed my laptop, spun up Nova + Codekit and started hacking away. In
20 minutes I had a prototype, unstyled with raw JS that could play 3
sounds with adjustable volume levels for each. By the time my son woke
up 2 hours later, I had added styling, screen awake lock so phones
wouldn't sleep, a timer for how long it took for my son to fall asleep,
and a graph that shows day over day his times to fall asleep (with data
stored using LocalStorage). It was still built with just raw HTML, CSS
and JavaScript (a single file) and I didn't use any AI bullshit
(especially since I have to use hotspot as my family doesn't have
internet). For as simple as the "app" is, I'm kind of proud of it. Not
because it's technically or visually impressive (far from it), but
because I had a problem and I used the tools I know well to solve it
quickly.

## Personal Software

My shushing app made me think about the idea of "personal software".
That is, software built not for others, but to solve a very specific
problem you alone have. Most people use software built by a company,
designed for the flows that support their business cases (extracting
money from their users). It's refreshing to use a piece of software that
does exactly what you need and that you know inside and out. Even for my
app being so simple, I've enjoyed using it. When my kid falls asleep,
I'm excited to see how long it took and use the graph to compare to
yesterday. A feature that probably wouldn't make it past rounds of
usability studies and feature planning sessions exists in my app because
it was built for the needs of just one person (well, two if you include
my wife).