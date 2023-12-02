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
                // dd($validation);
                
                $check_chok_value = Model::where('chok_id', $validation['formData']['chok_id'])
                ->where('id', $validation['formData']['data']['value_id'])
                ->first();
                
                $form_item = (object) $validation['formData']['data'];

                if (!$check_chok_value) {
                    $chok_value = new Model();
                    $chok_value->colspan = $form_item->colspan;
                    $chok_value->rowspan = $form_item->rowspan;
                    $chok_value->row_no = $form_item->row_no;
                    $chok_value->col_no = $form_item->col_no;
                    $chok_value->ishide = $form_item->ishide;
                    $chok_value->value = $form_item->column_value;
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
                }else {
                    // dd($form_item, $check_chok_value);
                    $check_chok_value->colspan = $form_item->colspan;
                    $check_chok_value->rowspan = $form_item->rowspan;
                    $check_chok_value->row_no = $form_item->row_no;
                    $check_chok_value->col_no = $form_item->col_no;
                    $check_chok_value->ishide = $form_item->ishide;
                    $check_chok_value->value = $form_item->column_value;
                    $check_chok_value->isselected = $form_item->isselected;
                    $check_chok_value->isheading = 0;
                    $check_chok_value->width = $form_item->width;
                    
                    $check_chok_value->background_color = $form_item->background_color;
                    $check_chok_value->border = $form_item->border;
                    $check_chok_value->text_rotate = $form_item->text_rotate;
                    $check_chok_value->rotate = $form_item->rotate;
                    $check_chok_value->top = $form_item->top;
                    $check_chok_value->left = $form_item->left;
                    $check_chok_value->chok_id = $validation['formData']['chok_id'];
                    $check_chok_value->font_size = $form_item->font_size;
                    $check_chok_value->save();
                }

                return messageResponse("success", 201);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}