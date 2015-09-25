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

### Schemas

When creating a web service the default schema return from the root level of the resources. This is part of a somewhat separate JSON-Schema controller.  It shows some of the application level items. 


    {
      "$schema": "http://json-schema.org/draft-04/schema#",
      "basePath": "/public/api",
      "baseUrl": "https://api.yourdomain.com",
      "description": "API Cool End-User API",
      "documentationUrl": "http://docs.domain.apiary.io/#",
      "id": "appname:v1",
      "name": "appname",
      "version": "v1.0"
    }

### Class Structure

<a href="https://raw.githubusercontent.com/solvire/php-hypermedia-api/master/docs/laravel_hypermedia.png" target="_blank"><img src="docs/laravel_hypermedia.png" 
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

### Data Field Condition Attributes 

For each data field there are a set of attributes which will affect the functionality of your serializer.  Most of the attribute refer to transformations that might occur, while some are validators or filters. 

#### Read Only 

    readOnly

A field that is marked as `'readOnly'=>true` may not be written to. The serializer should ignore this field in determining data writes.  

Examples of this are date fields or account status fields. 

Default: `false`

#### Write Only 

    writeOnly
    
A field marked as `'writeOnly'=>true` will not be displayed to the end user. They are written to and may have filters or validators applied to them. 

Examples are passwords or point increment 

Default: `false`

#### Required Field

    required

If a field is marked with `'required'=>true` causes the system to throw an error if the field is not present during the update. Setting this to false is unnecessary since that is the default setting. 

Default: `false`


#### Allow Null Values

    allowNull 

If the field is marked with `'allowNull'=>true` the serializer will allow you to pass a null value with the field. The recording agent should also respect this request and set the data field to null as well. 

Default: `false` 

#### Allow Empty Strings

    allowEmpty

If the field is marked with `'allowEmpty'=>true` the serializer will allow you to pass an empty string ''. The recording agent should also respect this request and set the data field to blank as well. Note that null and empty strings are not the same. They should be treated differently.

Default: `false` 

#### Default Value

    defaultValue
    
Many times you may want to set a default value so that if the data isn't in the db or passed in that it is set already. `'defaultValue'=>'something'` 

Default: `null`

#### Column Name - Alias 

One of the biggest problems with an API response value is setting the keys and translating back and forth.  Setting a column name will help readability and usability. `'columnName'=>'mapped_column'`. For instance your users doesn't need to know the primary column is CompanyNameID. Just 'id' will be fine. 

Examples: Primary keys, sensitive names, ugly names

Default: null - uses your DB column name 

#### Validators 

This is not implemented yet, but you can assume that we will be allowing the ability to pass in chains of validators. We may standardize but that hasn't happened yet. Suggestions are welcome. 

### Output Specific Attributes 

#### Styling 

This is not implemented yet but you may pass back output related styling. 

#### Help Text 

For form fields and UI components it may be helpful to deploy information about it for the human interface. Not implemented yet. 

