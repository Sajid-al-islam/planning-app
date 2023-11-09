<?php

namespace App\Modules\Central\yearly_plan_details;

use App\Modules\Central\yearly_plan\Model as Yearly_planModel;
use App\Modules\Central\yearly_plan_complete_by_divisions\Model as Yearly_plan_complete_by_divisionsModel;
use App\Modules\Central\yearly_plan_hide_for_users\Model as Yearly_plan_hide_for_usersModel;
use App\Modules\Responsibles\Model as ResponsiblesModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "yearly_plan_details";
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

    public function plan() {
        return $this->belongsTo(Yearly_planModel::class, 'central_yearly_plan_id');
    }

    public function hidden_plan() {
        return $this->belongsToMany(Yearly_plan_hide_for_usersModel::class);
    }

    public function divisions() {
        return $this->belongsToMany(Yearly_plan_complete_by_divisionsModel::class);
    }

    public function responsibles() {
        return $this->belongsToMany(ResponsiblesModel::class);
    }

}