---
title: Discovering the Indie Web
tags: posts
layout: article.njk
date: 2025-11-13T12:05:01Z
---
I posted a mumble on this site recently about how vibrant the small web is, but realized a lot of people might not be familiar with some of the corners of the internet I mentioned. I want to use this post to give an introduction to various parts of the small/indie/hidden web.

## Blogs

The easiest to discover category is personal blogs. I'm constantly amazed by how many people run their own blogs and post frequently. Blogs are easily my top go to for learning new things and connecting with interesting people.

You might be asking "how do I discover blogs?", well fear not reader I've got you covered! Some awesome developers in the indie web space have created excellent tools for discovering blogs.

### Blog Discovery Tools

- [powRSS](https://powrss.com/) is a frequently updated feed of posts from blogs across the net. Combined with the "Shuffle" and "Random" features, it's easy to go down a StumbleUpon like rabbit hole of blog discovery!
- [Scour](https://scour.ing/about) generates a feed of posts relevant to your interests. It's a wonderful way to discover content in specific areas.
- [Bear Blog](https://bearblog.dev/discover/) is a wonderful blogging platform that also has a great discovery feature for finding recent posts from Bear Blog users.

### Reading Blogs

So what do you do after discovering a ton of awesome blogs? Subscribe to them via RSS of course! Nearly every blog I've run into has an RSS feed (search for mention of RSS or feeds, or try `/feed.xml`). Using an RSS reader, you can subscribe to as many blogs as you want and stay up-to-date on any new posts. Here's my recommendation for RSS readers:

- [Newsflash - Linux](https://apps.gnome.org/NewsFlash/) I daily an Ubuntu computer and absolutely **love** this reader. It has great features and uses a wonderful GTK UI.
- [NetNewsWire - Mac OS, iOS, iPad OS](https://netnewswire.com/) On the Apple side of things, NetNewsWire is excellent, free and well designed.

### Tips

While it might be tempting to shove your RSS reader full of blogs, I recommend exercising caution. You don't want to overwhelm yourself. Ending up with a badge of 100 daily unread posts has the potential to discourage you from reading any. Instead, follow those you are truly interested in, and avoid subscribing to commercial outlets that pump out constant content. Don't be afraid to remove feeds that no longer interest you!

## Gemini

Gemini, created by Solderpunk in 2019, is an updated version of the Gopher protocol that serves gemtext (markdown like) documents across it's custom protocol. Gemini, and Gopher, are especially cool as you'd never run across them unless you know about them. Think of it as a parallel internet focused on text.

You'll need a specific browsing client and a Gemini address to point it to. As Gemini is focused on text documents, it's a great place to read and most users post long-form content. Like blogs, we'll break this into two sections, reading and discovery.

### Gemini Clients

- [Lagrange](https://github.com/skyjake/lagrange) is an excellent Gemini/Gopher client available on all platforms (for iOS, you'll need to join the TestFlight).


### Gemini Discovery Tools

- Antenna is a feed aggregator that serves up posts from across the "Geminispace". You can access it in a Gemini browser at `gemini://warmedal.se/~antenna`
- CAPCOM is similar to antenna and can be accessed at `gemini://gemini.circumlunar.space/capcom`
- BBS is a bulletin board system (ie forum) for Gemini available at `gemini://bbs.geminispace.org/`
- Station is a micro-blogging platform for Gemini, available at `gemini://station.martinrue.com/`

### Tips

Make heavy use of Lagrange's bookmarking and subscription features to remember and keep up-to-date with Gemini pages you enjoy! Gemini moves a bit slower than the web, so don't be surprised with less frequent content updates.

## Public Unix Servers (pubnix)

Ohhh this is a nerdy one and I love it! Pubnix systems are Unix servers that you create an account on and access via SSH. On the server you'll find a community of other users that socialize via BBS style programs and internal emails, create and share zines and write games/programs/websites for others to enjoy. It's a whole community contained on a single computer!

Accessing a pubnix server is a lot more involved than blogs and Gemini. You'll need a baseline familiarity with the command line and SSH (I promise, it's not difficult!). For Mac users, you have a terminal built-in in the Applications folder. Windows users, you might still need [Putty](https://putty.org/index.html) for SSH (it's been ages since I've used Windows, so not positive). For Linux users, well...you're probably already familiar with the terminal. As for SSH, here's a [detailed guide](https://www.digitalocean.com/community/tutorials/how-to-use-ssh-to-connect-to-a-remote-server) from DigitalOcean on how to use it.

### Pubnix Server Recommendations

- [Ctrl-C.club](https://ctrl-c.club/) is part of the [Tildeverse](https://tildeverse.org/) and is my favorite pubnix!
- [Tilde.club](https://tilde.club/) is another great Tildeverse  server!
- [SDF](https://sdf.org) has been around since 1987. There's a manual verification process to unlock more features (put a couple dollars in an envelope and snail mail it to Seattle). **As of writing, SDF seems offline. I'm not sure if this is permanent. If so, I'm heartbroken.** 

### Tips

Spend some time to get familiar with the server you join! Each server has different software. For example, Ctrl-C uses the `iris` command to socialize, along with IRC channels. `SDF` has a `bboard` command and makes heavy use of email (which you can check with `alpine`).

## Bulletin Board Systems

Okay now we've gone full retro! A Bulletin Board System (BBS) is a piece of software running on a computer that others "dial into" (think phone lines) to communicate through posts, share files (totally legit files of course ;-/) and play "door" games. While BBS systems are probably the least active on this list, they are extremely fun to discover and you can find some genuinely great small communities. 

Admittedly I don't have as many recommendations for this category, but I can get you started! First off, you'll need a terminal to "dial in", then you'll need a server.

### BBS Terminals

- [SyncTERM](https://syncterm.bbsdev.net/) is a great option for Linux machines.
- [MuffinTerm](https://muffinterm.app/) is a beautiful option for Mac OS, iOS and iPad OS.


### BBS Servers

- [20 For Beers](http://20forbeers.com:1339/) is one of the most active BBS communities I have found. I joined them for DOOM night a few years ago and had an absolute blast!
- [The BBS Corner](https://bbscorner.com/bbs-users-zone/bbs-list/) has has recommendations on sites to discover active BBS servers.

--- 

I hope this article serves as a good starting place for those looking to discover the "hidden" web. I've found so much amazing content and had conversations with some awesome people thanks to the parts of the web most people overlook. 

If you have recommendations for servers or small web services, [shoot them my way](mailto:alex.white@hey.com) and I'll update this list!




