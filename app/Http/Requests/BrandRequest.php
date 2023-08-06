<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $curremtAction= $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($curremtAction):
                    case 'add':
                        //xây dựng rules validate trong này
                        $rules = [
                            'name' => 'required|unique:Brands',
                            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                        ];
                        return $rules;
                        break;
                        case 'edit':
                            //xây dựng rules validate trong này
                            $rules = [
                                'name' => 'required',
                               
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
            'name.required' => 'Chưa nhập tên',
            'logo.required' => 'Chưa nhập logo',
            'logo.image' => 'Không đúng định dạng',
        ];
    }
}
