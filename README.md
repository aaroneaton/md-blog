# MD-Blog (working title) #
_MD-Blog_ is a [Markdown-powered](http://daringfireball.net/projects/markdown/) 'script-less' blogging engine written in PHP. 

## Disclaimer ##
_MD-Blog_ is not anywhere near ready for production use. This software has not been tested for vulnerabilities.

__USE AT YOUR OWN RISK__

## What do you mean by 'script-less'? ##
Most static-file blogging engines require you to run a script to parse new blog posts and pages. _MD-Blog_ parses each file on-the-fly. 

## Doesn't on-the-fly parsing use up system resources? ##
Most likely. But I have no illusions of _MD-Blog_ being used for high-traffic blogs.

With a few posts in the system, the total server execution time is consistently less than 0.05 seconds. Eventually I will add a hundred or so posts and test again.

## Current Features ##
* Each blog post is its own Markdown file
* Search posts by tag

## Planned Features ##
* Automatically add pages and sub-pages to navigation bar based on directory stucture
* Search
* Easily accessible configuration file

## Instructions ##
1. Create a new file in `site/blog/` with the following naming standard: `yyyy-mm-dd-your-post-title-here.md`
2. Refresh the page in your web browser and enjoy your new post.

## Resources ##
* Markdown parsing provided by Michel Fortin's wonderful [PHP Markdown Extra](http://michelf.com/projects/php-markdown/extra/) class.
* PHP Framework: [CodeIgniter](http://codeigniter.com)

