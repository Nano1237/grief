# grief

Grief is a open Source RESTful *like* PHP Framwork. I developed it for the use with AngularJS.

My target is to develop a RESTful Framework with a RMM Level 3. 

## How can I use it? *the fast version*

- Clone the Repository
```
$ git clone https://github.com/Nano1237/grief.git
```
- config the project at the [config.ini](https://github.com/Nano1237/grief/blob/master/grief/config.ini)
- create a new `zone` in the [zone foder](https://github.com/Nano1237/grief/tree/master/grief/zones)
- create for each allowed request method for you zone a controller [*`(get as example)`*](https://github.com/Nano1237/grief/blob/master/grief/zones/demo_zone/get.php)

And now you'r done!

## How can I use it? *extendet version*

*After you'r cloned the Repository*
### How to config the config.ini

Everything you need to now is documented in the [config.ini](https://github.com/Nano1237/grief/blob/master/grief/config.ini).
Everything, that may be confusing is written below

##### Do I need a `model_prefix`?

No! you can set the option `model_prefix` to `''`. I just defned this option, that you can tell the controller from the model appart. But If you set the `model_prefix` to `''`, the you hve to name the model files exacly like the model class in order that the framework finds it.

##### What `ressource_options` can I use?

You can use any possible HTTP-Method you like. The only Method that is permittet is the `options` Method. You cant define a `options`-Controller, because the Request `options` doesnt starts the [`ControllerInitializer`](https://github.com/Nano1237/grief/blob/master/grief/core/ControllerInitializer.php)


### Folder-Structure of the [`zones`](https://github.com/Nano1237/grief/tree/master/grief/zones)

The Structure is pretty simple. You just need to define for each zone (the first part of the Request URL) a folder with the name.

##### Example:

The `demo_zone` is called like this `http://api.mysite.com/demo_zone/`.
If this URL is called with the HTTP-GET Method, then the Controller in `get.php` (*`GetController extends AbstractGriefGetController`*) is called.
```
- zones
    - demo_zone
        - get.php
        - put.php
        [...]
   
```

 Accept: application/xml header für return benutzen (HATEOAS)