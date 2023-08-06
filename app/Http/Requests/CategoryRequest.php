<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                        //xây dựng rules validate trong này
                        $rules = [
                            'name' => 'required|unique:categorys',
                        ];
                        return $rules;
                        break;
                        case 'edit':
                            //xây dựng rules validate trong này
                            $rules = [
                                'name' => 'required|unique:categorys',
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
            'name.unique' => 'Tên danh mục đã tồn tại',
        ];
    }

}
