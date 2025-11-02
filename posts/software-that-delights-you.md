---
title: Use Software that Delights You
tags: posts
layout: article.njk
date: 2025-09-09
---

I've always been into tech, and until recently that meant switching to
the newest, latest thing. Development frameworks, languages, IDEs, etc.
I figured if something new came out, it must be better and I had to jump
on it (or suffer the consequences of being left behind). But as I've
unfortunately come to learn, most new stuff is garbage, especially in
tech.

## Using What Works

One thing I've learned is that it's important to fight the urge to
follow that crowd, even when it comes to computing. If you tell the
average engineer you use Sublime Text in 2025, they'll probably look at
you like you're crazy (or ask what the hell is Sublime). But the thing
is, Sublime is still faster than most text editors, and isn't loaded
with AI garbage. The key is to find the tools that balance productivity
and satisfaction. While something like PHPStorm or VSCode might have
fancier auto complete, these tools don't satisfy me, and in turn lead to
me being less productive, despite all the extra features they introduce.

Satisfaction lends to creativity. It's a weird thing to say, that the
text editor or the CSS processor you use can lead to one being more
creative, but for me that's exactly the case. Using software that I
enjoy and that brings satisfaction inspires me. For example, any piece
of software from Panic is filled with inspiring UX, rock solid
functionality and performance that only native first applications can
achieve. Using something Panic's Nova editor inspires me to build and be
creative, because the tool itself is something I draw inspiration from.

## Slow Productivity and Flow States

The notion of sacrificing "productivity features" in order to be more
productive reminds of the book "Slow Productivity" by Cal Newport. In
the book, Cal argues that the song and dance of measuring productivity
by hours and overwork is in-fact less productive than taking things
slow.

Cal also talks about the importance of the "flow state", a state of
mental hyper-focus that allows time to melt away, something that you're
unlikely to enter when your overworked and balancing many tasks
competing for your attention. I believe most modern tools would also
prevent achieving a flow state. Think of a modern frontend workflow with
React and VSCode. To build a page you're fighting with `npm install`,
package versions, component abstraction, imports, VSCode suggesting AI
gibberish each time you type a word, console errors, etc etc etc. Each
added complexity is one more thing for your mind to track, and one less
chance at entering a flow state.

## What I Use

I want to highlight a few tools and pieces of software that I've found
enable a state of inspiration driven focus. I wish to make it clear,
these tools might (probably) won't do the same for you, you've gotta
figure out what works for you on your own. But the important part of
this section is the "why" these work for me vs popular tooling. I hope
that explaining the factors that contribute to inspirational tools will
help you fill your own software toolbox.

### Nova by Panic

Nova is the reason for this article. Heck, it's the reason for this
website! After downloading Nova, I fell in love with it's UX, and the
guiding philosophy behind the tool. Much like Coda before it, Nova is
best suited to old school software development. There's built in
functionality to add a remote SFTP server and publish files to it. A
preview tab let's you easily check your static files while you code. It
lends itself to a style of development that is less distracting and more
inspirational (as I'll cover soon).

Panic filled Nova's UI with amazing touches that make it a source of
inspiration. The welcome screen shows projects, customizable with colors
and icons, putting the mental focus on a single project. The default
themes are gorgeous (neon is one of the nicest I've seen in any editor).
When you highlight a bracket, the matching one gets a pulse animation.
Hovering the minimap shows you the matching tag and tag name. Colors in
HTML have a preview, which gives way to a color picker when clicked.
There's a menu item called "Zap Gremlins..." that removes nasty hidden
characters. There's so many small touches that made me say "wow" that I
can't possibly list them all. But each time I encounter a new one, it
further fuels my creativity. Nova is a tool that I want to use, not a
tool that I have to use.

### HTML, CSS, Tailwind, Plain JavaScript

My last iteration of this website ran on Hugo. I had installed the
Blowfish theme and customized a number of the partials. Content was
driven by Markdown that compiled into static HTML. I had a Github
Actions pipeline that would build and deploy the site. To hack on the
site, I needed to install Go and the Hugo tooling. ....That's a ton of
things to keep in my mind just to publish an article online. I had based
this stack around the thoughts of "I want this to be easy", "what if I
need to scale it out", "this is what a modern site should look like".
Because of the complexity (even though it's not that complex compared to
a lot of modern sites), working on the site wasn't interesting, or
inspiring. So I stopped, again (I've had more blogs than I can count).

Inspired by the workflow that Nova lends itself too, I switched to HTML
and CSS. Admittedly I did keep one tool from the modern world,
TailwindCSS, and I'll explain why in a sec. Now my site runs on any old
Apache/nginx server. It's easy to deploy, and easy to work on. The site
loads fast and works on any browser/computer/device. Most importantly,
there's less context switching. I've been working with HTML and CSS for
so long that I've memorized basically everything I need to know. I don't
need to look things up, and syntax doesn't change with updates. This
lets me focus on what I'm building without distraction. This is also why
I use Tailwind, the syntax is embedded in my brain, which allows me to
style things extremely quickly. For people that have never used
Tailwind, it would probably have the opposite effect, leading to looking
up syntax frequently and breaking any hope of flow.

### Codekit by Bryan

I've been using CodeKit for nearly 8 years, it's that good. I've renewed
my license multiple times (as recently as last month), and will keep
doing so for as long as Bryan keeps working on it.

CodeKit is from the era of Grunt and Gulp. It turns complicated,
unmaintainable build processes for frontend development into a drag and
drop workflow. While Grunt and Gulp are no longer relevant, CodeKit is
still the easiest way to compile SCSS, add Tailwind to a project,
optimize images for web and minify dependency files. The magic of
CodeKit is it's ability to take all of these pieces off of your plate.
Just point it to a folder, click the preview button and you instantly
have a frontend build process with automatic browser refreshing.

While CodeKit's core functionality is amazing, I have to touch on it's
UX as well. Like Nova, CodeKit is an obvious labor of love. The preview
link will animate transitions as you code (ie, change the position of an
element and it will slide to it's new spot). Open a preview on your
phone as well, and your devices will sync what page they're on. Similar
to Nova, projects are customizable by name and icon. While simple on the
surface, CodeKit's UI let's you dig and and configure everything to your
heart's desire.

## What's the Takeaway?

I want the takeaway of this article to be a license to use what you
love. An excuse to not feel guilty about "falling of the band wagon".
Use slower tools that inspire you instead of distract you. Find what
delights you, and ignore what doesn't. Strive for that state of flow.