<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        switch($this->method()):
            case 'POST':
                switch($curramtAction):
                    case 'add':
                        $rules=[
                            'name' => 'required',
                            'price' => 'required|numeric',
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                            'brand_id' => 'required',
                            'category_id' => 'required',
                        ];
                        return $rules;
                        break;

                    case 'edit':
                        $rules=[
                            'name' => 'required',
                            'price' => 'required|numeric',
                            'brand_id' => 'required',
                            'category_id' => 'required',
                            
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
            'image.required' => 'Chưa nhập ảnh',
            'image.image' => 'Không đúng định dạng',
            'brand_id.required'=>'bạn chưa chọn thương hiệu',
            'category_id.required'=>'bạn chưa chọn loại',
            'price.required' => 'Chưa nhập giá',
            'price.numeric'=> 'giá phải bằng số',

        ];
    }
}
