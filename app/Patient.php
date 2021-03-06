<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string gender
 * @property string lang
 * @property string birthday
 * @property string color_code
 * @property int user_id
 */

class Patient extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patient';

    protected $fillable = [
        'name', 'gender', 'lang', 'birthday', 'color_code', 'user_id',
    ];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function plannedActivities(){

        return $this->hasMany('App\PlannedActivities', 'patient_id');

    }
}
