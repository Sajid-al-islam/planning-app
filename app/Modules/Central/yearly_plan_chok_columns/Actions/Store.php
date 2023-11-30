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
                $table_chok_no = 1;
                
                // dd($validation);
                $check_chok = Model::where('chok_id', $validation['formData']['chok_id'])->orderBy('id', 'DESC')->first();
                if($check_chok) {
                    $table_chok_no = $check_chok->table_chok_no+1;
                }
                
                $table_chok_no_col_id = 1;
                foreach ($validation['formData']['data'] as $key => $form_items) {
                    $form_items = (object) $form_items;
                    foreach ($form_items as $key => $form_item) {
                        $form_item = (object) $form_item;
                        $chok_column = new Model();
                        $chok_column->table_chok_no_col_id = $table_chok_no_col_id++;
                        $chok_column->colspan = $form_item->colspan;
                        $chok_column->rowspan = $form_item->rowspan;
                        $chok_column->row_no = $form_item->row_no;
                        $chok_column->col_no = $form_item->col_no;
                        $chok_column->table_chok_no = $table_chok_no;
                        $chok_column->ishide = $form_item->ishide;
                        $chok_column->value = $form_item->value;
                        if($form_item->value) {
                            $chok_column->isheading = 1;
                        }else {
                            $chok_column->isheading = 0;
                        }
                        $chok_column->isselected = $form_item->isselected;
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
                        $chok_column->unique_id = uniqid() . $chok_column->id;
                        $chok_column->save();
                    }
                    
                }

                return messageResponse("success");
                
                // $chok_column_table_no = Model::where('chok_id', $validation['formData']['chok_id'])
                // ->orderBy('table_chok_no', 'DESC')
                // ->first();

                // $chok_columns = Model::select('*')
                // ->where('chok_id', $validation['formData']['chok_id'])
                // ->where('table_chok_no', $chok_column_table_no->table_chok_no)
                // ->get();

                // $groupedData = $chok_columns->groupBy('row_no')->values()->toArray();

                // return entityResponse($groupedData, 201);

            }
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}