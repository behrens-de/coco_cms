# COCO CMS
## Status:
this project is currently under construction and is scheduled to enter the alpha phase by the end of september 2021

## Description:
coco cms is a small content management system that helps the user to create individual web pages quickly and without unnecessary overhead and thus also helps not to artificially increase the loading time.

## Project structure
* private/
    * lib/
        * Coco/
            * Data.php
            * Pages.php
            * Settings.php
        * Data/
            * lang/
                * de-DE.json
            * pages.json
            * settings.json
    * autoloader.php
    * include.php 
* public/
    * admin/
        * index.pgp
    * index.php 



## Routs
all routes and page information are in the pages.json file. There is the possibility to use static but also dynamic routes. 

### Example Page-Item

```js
{ 
    "id": "zet373g" // random ID
    "route": "test", // static route
    "route":"test:param1:param:...", // dynamic route
    "status": 1, // 0 = not live | 1 = online
    "label": "test",
    ...
}
```

### Handling Routes
- \Coco\Router\indexRoutes() : void 


> last update: 2021-09-08

BY JAN BEHRENS