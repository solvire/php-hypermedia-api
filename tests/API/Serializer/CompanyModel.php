<?php

namespace LeadFerret\Lib\API\Serializers;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{

    public $timestamps = false;

    /**
     * The primary key used for this table
     *
     * @var string
     */
    protected $primaryKey = "ComapnyID";

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'Address',
        'City',
        'State',
        'zipcode',
        'latitude',
        'longitude',
        'email'
    ];
}
