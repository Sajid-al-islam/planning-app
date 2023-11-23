<?php

namespace App\Modules\Central\yearly_plan_chok;

use App\Modules\Central\yearly_plan_chok_columns\Model as Yearly_plan_chok_columnsModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Str;

class Model extends EloquentModel
{
    protected $table = "yearly_plan_choks";
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

    public function columns() {
        return $this->hasMany(Yearly_plan_chok_columnsModel::class, 'chok_id');
    }


    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }
}