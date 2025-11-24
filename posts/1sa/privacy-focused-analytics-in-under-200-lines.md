---
title: Privacy Focused Analytics in Under 200 Lines of Code
tags: posts
layout: article.njk
date: 2025-11-23T21:39:01Z
---
When I launched this blog, I told myself I wouldn't succumb to monitoring analytics. But, curiosity killed the cat and here we are!
I've built and deployed a privacy focused analytics "platform" for this blog. Best of all, it's under 200 lines of code and requires a single PHP file!

My analytics script (dubbed 1Script Analytics) works by recording a hash of the visitor's IP and date (inspired by [Herman's analytics](https://herman.bearblog.dev/how-bear-does-analytics-with-css/) on Bear Blog). This allows me to count unique visitors in a privacy friendly way.
The script itself is a single PHP file that does two jobs. When called directly (/analytics.php) it displays a dashboard with traffic data.
When used in an a simple JS function with the `mode=track` query parameter, it records the visit to a SQLite database.

![Screenshot of analytics](/posts/1sa/1sa.png)

That's it, super simple analytics. No cookies, JavaScript frameworks or dependencies. Throw it on your server, migrate the database and put a image tag
in your template file.

Wanna see my live analytics? Click [here](/analytics.php) for the analytics dashboard.

---

__Update__

Okay I fixed a few things, guess I'm a bit sleep deprived! To properly get the referrer, I switched to JavaScript to call the analytics
PHP script rather than the image method. I'm using a POST request via `fetch` to pass current page and referrer to PHP. Also updated
the styling slightly on the dashboard to use a grid layout. Finally, moved my sqlite file into a non-web directory on the server, updated config,
and bundled the analytics script with my 11ty deployment process. Planning to layer in some simple graphs in the future, but so far pretty happy
with how things are working!