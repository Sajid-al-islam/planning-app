<?php

namespace App\Modules\Central\yearly_plan_details_chok_values\Actions;

use App\Modules\Central\yearly_plan_details_chok_values\Actions\Validation;
use Illuminate\Support\Facades\Hash;
use App\Modules\Central\yearly_plan_details_chok_values\Model;
use Illuminate\Support\Facades\DB;

class Store
{
    static $model = \App\Modules\Central\yearly_plan_details_chok_values\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $validation = $request->validated();
            // if (self::$model::query()->create($request->validated())) {
            //     return messageResponse('Item added successfully', 201);
            // }
                
                $previous_ids = [];
                foreach ($validation['formData']['data'] as $key => $form_items) {
                    $form_items = (object) $form_items;
                    
                    foreach ($form_items as $key => $form_item) {
                        $form_item = (object) $form_item;

                        if (isset($form_item->id)) {
                            if($form_item->value != null && $form_item->isheading == 0) {
                                
                                    $chok_value = new Model();

                                    $chok_value->colspan = $form_item->colspan;
                                    $chok_value->rowspan = $form_item->rowspan;
                                    $chok_value->row_no = $form_item->row_no;
                                    $chok_value->col_no = $form_item->col_no;
                                    $chok_value->ishide = $form_item->ishide;
                                    $chok_value->value = $form_item->value;
                                    $chok_value->isselected = $form_item->isselected;
                                    $chok_value->isheading = 0;
                                    $chok_value->width = $form_item->width;
                                    
                                    $chok_value->background_color = $form_item->background_color;
                                    $chok_value->border = $form_item->border;
                                    $chok_value->text_rotate = $form_item->text_rotate;
                                    $chok_value->rotate = $form_item->rotate;
                                    $chok_value->top = $form_item->top;
                                    $chok_value->left = $form_item->left;
                                    $chok_value->chok_id = $validation['formData']['chok_id'];
                                    $chok_value->font_size = $form_item->font_size;
                                    $chok_value->save();
                                
                            }
                        }
                    }
                    
                }

                $chokColumns = DB::table('yearly_plan_chok_columns AS cc')
                ->select('cc.*', 'cv.value')
                ->leftJoin('yearly_plan_details_chok_values AS cv', function ($join) {
                    $join->on('cc.chok_id', '=', 'cv.chok_id')
                        ->whereColumn('cc.row_no', '=', 'cv.row_no')
                        ->whereColumn('cc.col_no', '=', 'cv.col_no');
                })
                ->get();

                $groupedData = $chokColumns->groupBy('row_no')->values()->toArray();

                return entityResponse($groupedData, 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}