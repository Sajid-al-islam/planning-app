<?php

namespace App\Modules\Central\yearly_plan_chok_columns;

use App\Modules\Central\yearly_plan_details_chok_values\Model as Yearly_plan_details_chok_valuesModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "yearly_plan_chok_columns";
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
    
    public function values() {
        return $this->hasOne(Yearly_plan_details_chok_valuesModel::class, 'yearly_plan_details_chok_column_id');
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }
}