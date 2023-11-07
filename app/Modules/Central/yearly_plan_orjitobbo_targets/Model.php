<?php

namespace App\Modules\Central\yearly_plan_orjitobbo_targets;

use App\Modules\Central\yearly_plan_details\Model as Yearly_plan_detailsModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "yearly_plan_orjitobbo_targets";
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

    public function plan_details() {
        return $this->belongsTo(Yearly_plan_detailsModel::class, 'yealy_plan_details_id');
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }
}