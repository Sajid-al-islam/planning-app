<?php

namespace App\Modules\Central\yearly_plan_chok_columns\Actions;

use App\Modules\Central\yearly_plan_chok_columns\Actions\Validation;
use App\Modules\Central\yearly_plan_chok_columns\Model;
use Illuminate\Support\Facades\Hash;

class Store
{
    static $model = \App\Modules\Central\yearly_plan_chok_columns\Model::class;

    public static function execute(Validation $request)
    {
        try {
            $validation = $request->validated();
            
            if($validation) {
                // Model::where('chok_id', $validation['formData']['chok_id'])->delete();
                foreach ($validation['formData']['data'] as $key => $form_items) {
                    $form_items = (object) $form_items;
                    foreach ($form_items as $key => $form_item) {
                        $form_item = (object) $form_item;
                        if($form_item->value != null) {
                            $chok_column = new Model();
                            $chok_column->colspan = $form_item->colspan;
                            $chok_column->rowspan = $form_item->rowspan;
                            $chok_column->ishide = $form_item->ishide;
                            $chok_column->value = $form_item->value;
                            $chok_column->isselected = $form_item->isselected;
                            $chok_column->isheading = $form_item->isheading;
                            $chok_column->width = $form_item->width;
                            $chok_column->background_color = $form_item->background_color;
                            $chok_column->border = $form_item->border;
                            $chok_column->text_rotate = $form_item->text_rotate;
                            $chok_column->rotate = $form_item->rotate;
                            $chok_column->top = $form_item->top;
                            $chok_column->left = $form_item->left;
                            $chok_column->font_size = $form_item->font_size;
                            $chok_column->chok_id = $validation['formData']['chok_id'];
                            $chok_column->save();
                        }
                    }
                }
                return messageResponse('Item added successfully', 201);
            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}