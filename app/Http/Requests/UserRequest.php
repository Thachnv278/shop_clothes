<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                            'name' => 'required',
                            'email' => 'required|email|unique:users',
                            'password' => 'required',
                        ];
                        return $rules;
                        break;
                    case 'addAdmin':
                        //xây dựng rules validate trong này
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email|unique:users',
                            'password' => 'required',
                        ];
                        return $rules;
                        break;
                    case 'edit':
                        //xây dựng rules validate trong này
                        $rules = [
                            'name' => 'required',
                            'email' => 'required|email',
                            'password' => 'required',
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
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Chưa nhập mật khẩu',
        ];
    }
}
