<?php

namespace App\Modules\Department\Department_plan\Actions;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class Validation extends FormRequest
{
    /**
     * Determine if the  is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * validateError to make this request.
     */
    public function validateError($data)
    {
        $errorPayload =  $data->getMessages();
        return response(['status' => 'validation_error', 'errors' => $errorPayload], 422);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'plan_details' => 'required',
            'section' => ['required', 'string'],
            'sub_section' => ['string'],
            'numeric_value' => ['numeric'],
            'deadline' => ['date'],
            'complete_month' => ['string'],
            'how_much_was_incomplete' => ['numeric'],
            'comment' => ['string'],
            'budget_id' => ['nullable'],
            'is_archive' => ['nullable'],
            'umbrella_id' => ['nullable'],
            'dofa_id' => 'required',
            'plan_category_id' => 'required',
            'status' => ['sometimes', Rule::in(['active', 'inactive'])],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validateError($validator->errors()));
        if ($this->wantsJson() || $this->ajax()) {
            throw new HttpResponseException($this->validateError($validator->errors()));
        }
        parent::failedValidation($validator);
    }
}