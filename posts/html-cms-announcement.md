---
title: I'm building a CMS for HTML
tags: posts
layout: article.njk
date: 2025-09-21
---

I've been building websites since I was a teen, writing HTML and Perl on
my iMac whenever I could take up the phone line. Since then I've created
websites for myself, small businesses and global corporations. I've held
the titles of senior frontend engineer, product designer and full-stack
developer. I've wrestled with React, Vue, Typescript, PHP, .NET and
countless others. I've split applications into microservices, then
brought them back into monoliths as the tide of web trends shifted.
Through all this, I've realized I find the most joy in building plain
HTML/CSS/JavaScript sites for small business clients.

When you trim away all the fat we've added to the process of building a
site, you're left with a creative canvas and a focused set of tools to
build with. Sticking with the basics lets me focus on building a great
site that helps my client's business grow. Additionally, it's a lot
easier to optimize for responsiveness, accessibility, load times and SEO
when you're dealing with the base tools of the web browser. All that
said, one client request always throws a wrench in this approach: "I
want to be able to make small changes to my site". A completely
reasonable request that greatly increases scope and, in turn, cost for
the client.

## Making Edits

To facilitate a client's perfectly reasonable request to update their
menu or business hours on their own, my toolset typically moves from
HTML/CSS/JS to Wordpress, Drupal, Wix or Squarespace. I now have to work
with a templating language, more complicated (and more expensive)
hosting, custom theme development or (in the case of "no code tools") a
never ending fight with tools that market themselves as "easy enough for
anyone" but instead complicate the process tenfold. Quick design pivots
and iterations become more difficult, SEO/accessibility/load time
optimization is a greater chore and future updates to the design become
a greater time burden.

## Enter htmlCMS

htmlCMS is a content management system for static HTML. It's meant to be
dead simple, you copy and paste the htmlCMS application into the root of
your static website, and you're off to the races. In addition to
enabling edits on a live static site, htmlCMS also bundles in a privacy
focused analytics platform and a simple CRM to manage and respond to
form submissions.

## A Focused UX

As mentioned, I've worked with a number of small business owners, both
as a freelance web developer and as a product designer at a digital
marketing agency. I've conducted interviews, usability studies and
observed their day to day operations. My number one takeaway is that
they are BUSY. Many are juggling numerous fires at once. Additionally,
most are not tech experts. They can manage online order forms, work with
their PoS and respond to emails, but they simply don't have time to
learn additional tools beyond that. Heck, more than once I've met owners
that keep their email username and password on a sticky note under the
counter for the couple of times a month they check it. This means adding
a complex tool like Wix or Squarespace (and usually Google Analytics as
well) into their workflow is simply out of the question.

I'm building htmlCMS with a hyperfocus on what I know about the needs of
both freelancers AND small business owners. I would easily argue that
nearly every tool on the market is overly complex. I have clients that
have Wix or Squarespace sites and Google Analytics, and none of them
have the time or confidence to utilize the tools. With that said, let's
dig into my two main personas, the freelancer and the client.

### The Freelancer Perspective

Imagine this, you've taken on a new client that want's a website to
promote their business. You craft a site with HTML, CSS and maybe a
small sprinkling of JS. You mark the parts of the site you want the
client to have edit access to with a `.htmlcms-edit` class, and add
`<script>` includes for the htmlCMS analytics script. Once you've gotten
sign off, you SFTP the files onto a $5/month DigitalOcean VPS. Finally,
you SFTP the htmlCMS folder into the same directory. You've delivered a
full CMS powered site without custom themes development or templating
languages, and you have the flexibility to host it wherever works best.

### The Client Perspective

Now let's imagine the other perspective. The developer you hired to
build your website published everything to the internet a few weeks ago.
As business has picked up, you've decided to adjust your hours and
prices. You go to your website and add `/edit` to the URL. You login and
are presented with your same website, but this time with a Microsoft
Word like toolbar to add and format text. You click on your hours to
change them, then navigate over to the services page and adjust prices.
Next, you decide to check how the site is performing by clicking the
"Traffic" tab. Looks like the "Fall Promotions" page is getting a lot of
traffic from an article posted by the local news, excellent! Finally,
you notice a badge on the "Inquiries" tab. Clicking on it reveals that a
customer sent a message yesterday about catering an event. You reply to
the customer and sign off.

## How I'm Building htmlCMS

### Building a Product for Myself

I strongly believe the best products are built by those who actually use
and have an interest in the product. It's impossible to craft a good,
user-focused product with a team that just stomps out tickets without a
desire or need to actually use the software in their day to day. htmlCMS
is the direct result of needing a better solution for my freelance
clients. In fact, I'll be rolling out the second production usage of
htmlCMS with a client project I'm finishing up (the first production
usage is on this website)!

### Building Simply

If it isn't obvious by now, I strongly believe that, in most cases, the
older way of building websites and web applications is better. We've
greatly over complicated software development, which has lead to slower
development cycles and less creativity (it's hard to be innovative when
any change takes 2-3 sprints). htmlCMS is built using PHP, CSS and
JavaScript. No frameworks, no composer or node modules, no build
processes. It's simply not needed. This enables me to focus on building,
rather than context switching between a million different tools.

### Selling Simply

I'll be following the lead of Once from 37Signals. One price gives you
the software, the codebase, limited support and updates until the next
major version. You buy the software, you own it. No subscriptions. I
don't know what pricing will be yet, but it will be fair and something
I'd be willing to pay as a freelancer.

## What's Next

htmlCMS is super early right now, but it is powering this website, and
soon, a client's website. I plan to start selling htmlCMS soon, but only
when it's ready.

### Interested? Let's Chat!

This is a project I'm really passionate about, and I'd love to chat with
anyone that is interested. Even if your reaction was "ugh that's a
terrible idea", let's chat. I'm all ears for suggestions, criticism or
if you want access to an early build. You can reach me at:
[hi@thatalexguy.dev](mailto:hi@thatalexguy.dev).

