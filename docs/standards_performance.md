# Quaco theme performance allergies

Quaco encourages people to develop a fast loading theme. Partly because [#3 in the top 3 SEO factors](https://www.searchenginejournal.com/top-3-google-factors/308147/#close) is performance. Quaco has build-in tools that do about 70% of the work, the other 30% must be achieved by the programmer but don't worry, we got your back. 

Besides performance optimization the most important thing in SEO is content, if you are interested, go ahead  and read about [Quaco SEO standards](asdasd).

**If there is an item on this list that shouldn't be there then don't hesitate** [join us on Discord](https://discord.gg/wPZy3U) **and start a fight.**

| #Nr | Allergic to | Reaction| Why |
|--|--|--|--|
| **#1** | No Gzipping | :skull: | Gzipping compresses files sizes even further than minifying them. They can reduce loading times up to 75%. |
| **#2** | Uncompressed images | :skull: |  Images are loading time killer #1. An uncompressed image of 2.5mb weighs as much as 86 HTML pages weighing 29kb each. Compressing an image without noticeable loss of quality can, in some cases, reduce the size up to 1 / 100th of its original format. An image of 150x150 should not weigh more than 10kb. |
| **#3** | HTTP | :skull: | Domains without HTTP'S' <- are not save and therefor Google doesn't like them that much
| **#4** | Single page sites | :skull: | Although single page sites are very popular here are [5 reasons why they are bad for SEO](https://seo-hacker.com/single-page-websites-bad-seo/) |
| **#5** | Large ammount of request | :skull: | The more request, the longer the que, the more loading. The type of request doesn't matter (img, xhr, ws, css, doc, etc.). Any resource should be combined as much as possible.|
| **#6** | Ajax without history | :skull: | If navigating happens based on XML requests (AJAX) make sure to use history and load content according to slugs, GET request should also be casheable |
| **#7** | jQuery | :skull: | Every browser support vanilla JS so please stop adding jQuery to improve productivity instead of quality.|
| **#8** | No .min files | :skull: | Minifying your files (also dynamic page with sitemap pre-cashing to static html files) can reduce loading times up to 70% |
| **#9** | JS in `<head>` | :skull: | JS in your head delays primary content from being loaded. If your site uses JS to compile then it could be possible that you are dealing with a mature design fault.  |
| **#10** |More than 1 CSS file| :broken_heart: | I know.. A big CSS file is messy but the amount of request ways more than your organized file structure. *(The best way is to compile CSS based on device/viewport... feature request? :D)*|
| **#11** |More than 2 JS files| :broken_heart: | For 1 page there shouldn't be more then 2 JS files. One for your overall 'scripts', the other 'page' related |
| **#12** | No browser cache | :broken_heart: | Just like Gzip, cache has to do everything with loading times. If an HTTP request is still fresh local storage will be consulted instead of re downloading. |
| **#13** | Inline JS/CSS | :broken_heart: | Some people might argue inline CSS because it can increase render times if you only use CSS that before the folt |
| **#14** | Expire header | :lemon: | Expires headers tell the browser whether a resource on a website needs to be requested from the server or fetched from local storage |
| **#15** | CDN | :lemon: | When using a content delivery network, visitors worldwide will be connected to the nearest proxy server reducing loading items |

*There are many more optimization with lower priority that we didn't put in this list, feel like its missing important aspects? Get in contact.*
