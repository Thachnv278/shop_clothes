<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $curramtAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($curramtAction):
                    case 'add':
                        $rules = [
                           'code'=> 'required|unique:sales',
                           'discount' => 'required|numeric',

                        ];
                        return $rules;
                        break;

                    case 'edit':
                        $rules = [
                            'code'=> 'required|unique:sales',
                           'discount' => 'required|numeric',

                        ];
                        return $rules;
                        break;
                endswitch;
                break;
        endswitch;

        return [
            //
        ];
    }
    public function messages()
    {
        return [
            'code'=> 'Vui lòng nhập mã',
            'discount' => 'Vui lòng nhập số tiền',
            
        ];
    }
}
