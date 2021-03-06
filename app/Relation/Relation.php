<?php

namespace App\Relation;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'relation';
    public $timestamps = false;

    protected $fillable = [
        'name', 'price','lokacija_id'
    ];

    public function defaultRelations()
    {
        return $this->belongsToMany('App\Relation\Relation', 'employee_relation')
            ->as('defaultRelations');
    }

    public function user()
    {
        return $this->belongsTo('App\User\User');
    }

    public function travelingExpenseRelations()
    {
        return $this->hasMany('App\TravelingExpense\TravelingExpenseEmployeeRelation');
    }

    public function lokacija()
    {
        return $this->belongsTo('App\Lokacija\Lokacija');
    }
}
