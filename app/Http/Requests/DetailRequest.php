<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
                            'color' => 'required',
                            
                            // 'size' => 'required|M,L,XL,XXL,XXXL',
                            'quantity' => 'required|numeric',


                        ];
                        return $rules;
                        break;
                    case 'edit':
                        $rules = [
                            'color' => 'required',
                         
                            // 'size' => 'required|in:M,L,XL,XXL,XXXL',
                            'quantity' => 'required|numeric',


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
    public function messages(){
        return [
            'color.required' => 'Chưa nhập màu',
            
            'size.required' => 'Chưa nhập kích thước',
          
            'quantity.required' => 'Chưa nhập số lượng',
            'quantity.numeric'=> 'Số lượng phải bằng số',
        ];
    }
}
