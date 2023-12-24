<?php

namespace App\Modules\Dofa;

use App\Modules\Central\yearly_plan_details\Model as Yearly_plan_detailsModel;
use App\Modules\Department\Department_plan\Model as Department_planModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "dofas";
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($data) {
            $random_no = random_int(100, 999) . $data->id . random_int(100, 999);
            $slug = $data->title . " " . $random_no;
            $data->slug = Str::slug($slug);
            $data->save();
        });
    }


    

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }

    public function plan_details() {
        return $this->belongsTo(Yearly_plan_detailsModel::class,'id','dofa_id');   
    }
    
    #make a relation with hasmany DepartmentPlan with the forign key of dofa_id
    public function department_plans() {
        return $this->hasMany(Department_planModel::class,'dofa_id','id');   
    }


}