<?php

namespace App\Modules\Dofa\Actions;

use App\Modules\Dofa\Actions\Validation;

class Update
{
    static $model = \App\Modules\Dofa\Model::class;

    public static function execute($dofa, Validation $request)
    {
        try {
            if (!$dofa) {
                return messageResponse('Data not found...', 404, 'error');
            }
            // dd($request->all(), $request->validated());
            $dofa->update($request->all());
            return messageResponse('Item updated successfully');
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), 500, 'server_error');
        }
    }
}