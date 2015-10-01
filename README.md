# PHP Hypermedia API Layer for HATEOAS HTTP or REST Services
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
 * PhoneField
 * GenderField (normalized)
 * TransformerField (fractal)
 * SerializerField (recursive)
 

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



### Serializer Example 

Here is an example of a serializer for a company record. It extends the `LaravelModelSerializer` which can interface with Laravel models explicitly. At some point we will integrate with symfony but not at this time. 

```php
use Solvire\API\Serializers\DataFields\CharField;
use Solvire\API\Serializers\DataFields\BooleanField;
use Solvire\API\Serializers\DataFields\IPAddressField;
use Solvire\API\Serializers\DataFields\DateTimeField;
use Solvire\API\Serializers\DataFields\EmailField;
use Solvire\API\Serializers\DataFields\IntegerField;
use Solvire\API\Serializers\LaravelModelSerializer;
use Solvire\API\Serializers\DataFields\SplitPointField;


/**
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace App\Http\Controllers\API\Serializers
 */
class CompanySerializer extends LaravelModelSerializer
{
    
    public function initDataFields()
    {
        
        $this->addField('id', new IntegerField(['readOnly'=>true, 'columnName'=>'ComapnyID']))
             ->addField('name', new CharField(['columnName'=>'Company_name']))
             ->addField('address', new CharField(['columnName'=>'Address']))
             ->addField('city', new CharField(['columnName'=>'City']))
             ->addField('state', new CharField(['columnName'=>'State']))
             ->addField('zip', new CharField(['columnName'=>'Zip']))
             ->addField('county', new CharField())
             ->addField('area_code', new IntegerField(['columnName'=>'AreaCode']))
             ->addField('phone', new CharField(['columnName'=>'Comp_phone']))
             ->addField('domain', new CharField())
             ->addField('sic', new CharField(['columnName'=>'SIC']))
             ->addField('revenue', new IntegerField(['columnName'=>'Rev']))
             ->addField('employees', new IntegerField(['columnName'=>'Emps']))
             ->addField('exp_id', new IntegerField(['writeOnly'=>true,'columnName'=>'ExpID']))
             ->addField('naics', new IntegerField(['columnName'=>'NAICS']))
             ->addField('year_founded', new IntegerField())
             ->addField('f1000', new IntegerField())
             ->addField('alexa', new IntegerField())
             ->addField('fbpage', new CharField())
             ->addField('opt_out', new BooleanField(['writeOnly'=>true]))
             ->addField('location', new SplitPointField(['latitudeColumn' => 'latitude', 'longitudeColumn' => 'longitude', 'allowNull' => true]));
    }
    
    
}
```


Here we have an example of a health check serializer. Since this is just a heartbeat response we don't really need to interface with the database. It doesn't need data binding. For this case we just extended the `ArraySerializer`. Basically only output although we might be able to find some input use cases for it.


```php
use Solvire\API\Serializers\ArraySerializer;
use Solvire\API\Serializers\DataFields\CharField;
use Solvire\API\Serializers\DataFields\BooleanField;
use Solvire\API\Serializers\DataFields\IPAddressField;
use Solvire\API\Serializers\DataFields\DateTimeField;

/**
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace LeadFerret\Http\Controllers\API\Serializers
 */
class HealthSerializer extends ArraySerializer
{
    
    public function initDataFields()
    {
        $this->addField('status', new CharField());
        $this->addField('server_data', new CharField());
        $this->addField('ip', new IPAddressField());
        $this->addField('you', new CharField());
        $this->addField('stage', new CharField());
        $this->addField('alive', new BooleanField());
        $this->addField('timestamp', new DateTimeField());
    }
    
}

```

The server response will look like this. It should format the fields into their proper data types. More flexibility will be added for the various fields in the future. Things such as setting timezones and adding translations. 


```json
{
    "alive": true, 
    "ip": "192.168.56.1", 
    "server_data": "LF API", 
    "stage": "development", 
    "status": "OK", 
    "timestamp": {
        "date": "2015-09-25 22:23:51.000000", 
        "timezone": "UTC", 
        "timezone_type": 3
    }, 
    "you": "HTTPie/0.9.2"
}
```


I've included a class here with some examples of two data field types: TransformerField and SerializerField.  As you expect these perform complex nested serializations. Below this class is an example of a sample output. 

```php
use Solvire\API\Serializers\DataFields\CharField;
use Solvire\API\Serializers\DataFields\BooleanField;
use Solvire\API\Serializers\DataFields\DateTimeField;
use Solvire\API\Serializers\DataFields\IntegerField;
use Solvire\API\Serializers\DataFields\PhoneField;
use Solvire\API\Serializers\LaravelModelSerializer;
use Solvire\API\Serializers\DataFields\SerializerField;
use Solvire\API\Serializers\DataFields\TransformerField;
use Solvire\API\Serializers\DataFields\SplitPointField;
use LeadFerret\Models\Transformers\API\DepartmentToCategoryTransformer;
use Solvire\API\Serializers\DataFields\GenderField;


/**
 * Serialize a contact object 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace LeadFerret\Http\Controllers\API\Serializers
 */
class ContactSerializer extends LaravelModelSerializer
{

    /**
     * (non-PHPdoc)
     * @see \Solvire\API\Serializers\BaseSerializer::initDataFields()
     */
    public function initDataFields()
    {

        // the serializer field takes a closure 
        $company = function ($model) {
            return $model->company;
        };
        
        $getModel = function ($model){
            return $model;
        };
        
        $this->addField('id', new IntegerField(['readOnly'=>true, 'columnName'=>'ContactID']))
             ->addField('first_name', new CharField(['columnName'=>'first_name']))
             ->addField('last_name', new CharField(['columnName'=>'last_name']))
             ->addField('title', new CharField(['columnName'=>'user_title']))
             ->addField('phone', new PhoneField(['columnName'=>'contact_phone']))
             ->addField('created', new DateTimeField(['columnName'=>'created_on','format'=>'Y-m-d H:i:s']))
             ->addField('score', new IntegerField())
             ->addField('crowd_score', new IntegerField())
             ->addField('title_level', new CharField(['columnName'=>'title_levels']))
             ->addField('gender', new GenderField(['maleValue'=>'Male','femaleValue'=>'Female'])) // normalized gender values 
             ->addField('ads_status', new IntegerField(['writeOnly'=>true]))
             ->addField('useragent', new CharField())
             ->addField('device', new CharField(['writeOnly'=>true,'columnName'=>'uadevice']))
             ->addField('opt_out', new BooleanField(['writeOnly'=>true]))
             ->addField('company', new SerializerField( ['serializer'=>new CompanySerializer(), 'callback' => $company] )) 
             ->addField('professional_categories', new TransformerField(['transformer'=> (new DepartmentToCategoryTransformer()), 'callback' => $getModel ])); 
    }
}
```
The serializer field is basically a tested data field for bringing in already defined serializers. 

The transformer can transform your data in any format you need. Literally. I had a unique case I had to combine a lot of fields to create the data as it was so I passed the model in the closure. 


And the output:

```json
{
    "currentItemCount": 1, 
    "items": [
        {
            "company": {
                "address": "4209 Technology Drive", 
                "alexa": 0, 
                "area_code": 510, 
                "city": "Fremont", 
                "county": "Alameda", 
                "domain": "123.com", 
                "employees": 15, 
                "f1000": 0, 
                "fbpage": "", 
                "id": 38252, 
                "location": {
                    "latitude": 37.520000457764, 
                    "longitude": -121.95999908447
                }, 
                "naics": 0, 
                "name": "3PARdata, Inc.", 
                "phone": "510-413-5999", 
                "revenue": 35, 
                "sic": "3572", 
                "state": "CA", 
                "year_founded": 1999, 
                "zip": "94538"
            }, 
            "created": {
                "date": "2015-09-30 06:06:55.000000", 
                "timezone": "UTC", 
                "timezone_type": 3
            }, 
            "crowd_score": 0, 
            "first_name": "Jeff", 
            "gender": "male", 
            "id": 12756, 
            "last_name": "Song", 
            "phone": "510-413-1234", 
            "professional_categories": [
                "engineering", 
                "photographer"
            ], 
            "score": 38, 
            "title": "Vice President of Engineering and Founder", 
            "title_level": "VP", 
            "useragent": "Chrome"
        }
    ], 
    "itemsPerPage": "50", 
    "pageIndex": 1, 
    "totalItems": 1, 
    "totalPages": 1
}
```

