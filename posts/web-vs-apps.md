---
title: Web vs Apps
tags: posts
layout: article.njk
date: 2025-10-31
---

First off, Happy Halloween to those that celebrate! My kid got more
candy then he'll ever be able to eat during trick-or-treat last night,
which means I have to step up to the plate and help eat it. It's hard
work, but somebody's got to do it! Now on to the post.

I just read [Why NetNewsWire is Not a Web App](https://inessential.com/2025/10/04/why-netnewswire-is-not-web-app.html) 
from Brent Simmons. He's the creator of NetNewsWire, which is the
Mac OS application I use for reading RSS (and an absolutely excellent
application at that). I stumbled upon this article via [Evan's post](https://evanhahn.com/notes-from-october-2025/).

I've posted on this blog about building my first Mac application,
[Ryder](https://thatalexguy.dev/posts/ryder-project/). Brent's article
really resonated with me as it's a lot of the same reasons I've decided
to dive into the native application world. 

Simply put, building a web application is expensive and requires
knowledge across a ton of domains. You have to maintain the server, the
domain, database, authentication, scaling, downtime, payment processing,
etc etc etc. Layer on the millions of decisions you have to make as a
developer, such as: backend language, frontend framework, backend
framework database engine, design library, payment processor, monitoring
provider, host, etc.

 Building an app is a lot more straightforward. Wanna build a Mac app?
 Swift + SwiftUI + CoreData. Distribution through Mac Store or throw up
 a simple HTML page and link to Gumroad to pay & download a binary. A
 lot of decisions are taken care of, letting you focus on building the
 app. When people buy your app, you don't have to worry about a database
 going down at 2am, script kiddies DDOSing your infrastructure on a
 holiday, or your servers blowing up while you're on a vacation in China
 without a laptop resulting in losing all of your clients due to over a
 month of downtime (yeah that last one is personal....RIP MetaShort).

  I've been a web developer for a LONG time. My first web dev job was in
  college. And to be honest, I'm tired of it. Don't get me wrong, I
  __love__ the small web. Blogs, HTML+CSS pages...the simple stuff. But
  I'm so sick of "web applications", the bloat, the decisions, the
  constant on-call support. I want to build something useful for myself
  (and hopefully others). The second it stops being fun, I'm out. And
  that's why I'm moving my focus to native applications.