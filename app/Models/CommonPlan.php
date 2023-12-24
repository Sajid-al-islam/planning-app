<?php

namespace App\Models;

use App\Modules\Central\yearly_plan_details\Model as Yearly_plan_detailsModel;
use App\Modules\Department\Department_plan\Model as Department_planModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonPlan extends Model
{
    use HasFactory;
    protected $guarded = [];

    # make a hasOne relationship with department_plan with the foreign key of department_plan_id
    public function department_plan()
    {
        return $this->hasOne(Department_planModel::class, 'id', 'department_plan_id');
    }

    #make a hasOne relationship with yearly_plan_details with the foreign key of centrail_plan_id
    public function central_plan()
    {
        return $this->hasOne(Yearly_plan_detailsModel::class, 'id', 'central_plan_id');
    }
    
}
