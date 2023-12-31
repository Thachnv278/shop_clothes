<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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

        $curremtAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($curremtAction):
                    case 'add':
                        $rules = [
                            'name' => 'required',
                            'email' => 'required',
                            'phone' => 'required',
                            'address' => 'required',
                        ];
                        return $rules;
                        break;
                endswitch;
                break;
        endswitch;
        
    }
    public function messages()
    {
        return [
            'name.required' => 'chưa nhập tên',
            'email.required' => 'chưa nhập email',
            'phone.required' => 'chưa nhập phone',
          
            'address.required' => 'chưa nhập address',
        ];
    }
}
