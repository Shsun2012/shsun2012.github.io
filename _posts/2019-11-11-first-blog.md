---
layout: post
title: "Set up a personal website with templates"
subtitle: 'My first blog'
author: "Shsun"
header-style: text
tags:
  - Blog
  - Jekyll
  - Bootstrap
---

### Before start
I was intended to write all the css and html scripts since I've taken related courses in college. Truth is, I have only learned the basics, some even outdated. It is also complicated enough for me to give up at the very first step. After a year, I decide to use templates and to make things easier.

### Bootstrap Templates
By using templates, I meant to implement bootstrap on my current Github website. I read some great tutorials such as [Bootstrap 4 start-up](https://nicolas-van.github.io/bootstrap-4-github-pages/) and also the [official introduction to bootstrap](https://getbootstrap.com/docs/4.3/getting-started/introduction/). Then I came to this blog template, [Clean Blog](https://github.com/BlackrockDigital/startbootstrap-clean-blog). I've seen many people using very similar layout, which they probably forked from this. Finally I decided to fork [Hux Blog](https://huangxuan.me/) which is also derived from Clean Blog but with more functions.  

### Set up environment
GitHub Pages are powered by [_Jekyll_](https://github.com/jekyll/jekyll), a blog-aware static site generator in Ruby. which can be used to maintain your website and test locally. You may need to update your ruby version and change the path for default ruby. To do this, first install rvm:

```console
~$ brew install ruby
~$ export PATH=$HOME/.gem/ruby/X.X.0/bin:$PATH
```

Install Jekyll with gem.
```console
~$ gem install bundler jekyll
```

To start, use bundler (this will generate a Gemfile):
```console
~$ bundle init
~$ bundle add jekyll
~$ bundle exec jekyll serve
```
Two major issues I've encountered when jekyll failed are ruby version and xcode version. The xcode issue (also outdated gcc version) is solved in [this solution thread](https://github.com/juthilo/run-jekyll-on-windows/issues/34) by:
```console
~$ gem sources --remove https://rubygems.org/
~$ gem sources -a http://rubygems.org/
~$ gem install jekyll
```
### Start blogging
After setting up the website, now it's time to start blogging with markdown which converts your text to HTML files. I used to set up my website for a CS course homework with hand-written html and css. Those days are gone now. Markdown makes things easier.

### Add emojis :smiley:

A issue caused by img settings in css files. A couple of lines needed for using [*Jemoji*](https://github.com/jekyll/jemoji).
* First update sheetstyle file to use inline (if default is block) for img.emoji. Then update min.css file.
```html
img.emoji {
    display: inline;
    height: 1em;
    width: 1em;
    margin-bottom: 0.25em;
}
```
* Install jemoji:
```console
gem install jemoji
```
* Modify Gemfile (or bundel add jemoji)
```console
gem 'jemoji'
```
* Add jemoji in config.yml:
```
plugins:  - jemoji
```
Some cheat sheet for emojis [here](https://www.webfx.com/tools/emoji-cheat-sheet/).
* Enjoy:pig:!
