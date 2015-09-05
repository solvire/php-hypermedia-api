# PHP Hypermedia API Wrapper for HATEOAS HTTP or REST Services
## Repo: php-hypermedia-api

[![Build Status](https://travis-ci.org/solvire/php-hypermedia-api.svg?branch=master)](https://travis-ci.org/solvire/php-hypermedia-api)
[![Latest Stable Version](https://poser.pugx.org/solvire/php-hypermedia-api/v/stable)](https://packagist.org/packages/solvire/php-hypermedia-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/solvire/php-hypermedia-api/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/solvire/php-hypermedia-api/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/solvire/php-hypermedia-api/badges/build.png?b=master)](https://scrutinizer-ci.com/g/solvire/php-hypermedia-api/build-status/master)
[![License](https://poser.pugx.org/solvire/php-hypermedia-api/license)](https://packagist.org/packages/solvire/php-hypermedia-api)


## NO REST 4 U!

Let's just say it. Your API is probably not RESTful. I don't even like using the term anymore. 

----

## Installation 

    composer require solvire/php-hypermedia-api
    
#### Compatibility 

Runs on: 

 - php 5.5+
 - php 7
 - HHVM

#### Frameworks

 - Laravel 

## History 

This work originally started trying to bring the [LeadFerret](https://leadferret.com) front-end user API into compliance.  It was something I started a few years ago, but was never given the chance to finish.  Late nights and coffee pushed it through. 

## Philosophy 

*Why?*

"Knowing the questions to ask is sometimes more important than knowing the answer." - Smart A. Dude

When you land on a random webpage the authors care enough to provide you a way to navigate the server.  Most APIs will only return exactly what you are asking for. You have to read the documentation to know where to go next and what that record actually means.  

## Hypermedia API 

The / root of the application should provide enough information that a machine may transverse the server on it's own. 

This library intends to wrap an agnostic framework and provide utilities to produce hypermedia context more easily.  This context is meaning behind the returned data. 

For REST to be valid it needs to provide context in the form of hypermedia.  Again see [Roy T. Fielding](http://roy.gbiv.com/untangled/2008/rest-apis-must-be-hypertext-driven) on the topic. 

### HATEOAS - Hypermedia as the Engine of Application State

----


## Architecture

### JSON-Schema 

Taking a queue from google developers discoverability service, we opted for using the JSON Schema definition structure. Specifically [JSON Schema draft 04](http://tools.ietf.org/html/draft-zyp-json-schema-04).

There are obvious benefits with having a schema in place. Validation, client generation, etc. 

In order for JSON Schema to work properly the types of responses are strongly defined. There is no guessing. 

Some of the features were loosely modeled on the [Django Rest Framework \(DRF\)](http://www.django-rest-framework.org/). Primarily how they treat their views which we call *renderers*. 

### Class Structure

<a href="https://github.com/solvire/php-hypermedia-api/docs/laravel_hypermedia.png" target="_blank"><img src="docs/laravel_hypermedia.png" 
alt="PHP Hypermedia API" width="800" /></a>


### Representation Controllers 

This object will be the authority to respond back to the control with all data and context related to the resource. Attached to it are the renderers which can present and handle interactions with the data. 


### Renderers 

This is the gateway in and out of the database. It takes the data in and moves it through the serializer into the DB. Also in reverse. Some can also just parse an array for static content. They should be output agnostic. The serializers are attached.


### Serializers 

Define your resource structure here. Each field has an object with very specific types. 

### Data Fields 

There is an object for each one of your favorite data types. Below is the list. 

 * BooleanField 
 * CharField 
 * DataField 
 * DataFieldCollection 
 * DateField 
 * DateTimeField 
 * DoubleField 
 * EmailField 
 * FileField 
 * FloatField 
 * IPAddressField 
 * ImageField 
 * IntegerField 
 * ListField 
 * PointField 
 * ReadOnlyField 
 * RegexField 
 * SplitPointField 
 * TimeField 
 * URLField 
 * UUIDField 

