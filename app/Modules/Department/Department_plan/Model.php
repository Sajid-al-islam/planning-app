<?php

namespace App\Modules\Department\Department_plan;

use App\Modules\Central\yearly_plan_orjitobbo_targets\Model as Yearly_plan_orjitobbo_targetsModel;
use App\Modules\Dofa\Model as DofaModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "department_plans";
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

    public function dofa() {
        return $this->hasOne(DofaModel::class, 'id', 'dofa_id');
    }

    public function orjitobbo_target() {
        return $this->hasOne(Yearly_plan_orjitobbo_targetsModel::class, 'id','orjitobbo_target_id');
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }
}