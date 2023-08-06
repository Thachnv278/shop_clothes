<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
                    case 'signin':
                        //xây dựng rules validate trong này
                        $rules = [
                            'email' => 'required|string|email|max:255',
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
            'email.required' => 'Chưa nhập email',
            'email.string' => 'Không đúng định dạng',
            'email.email' => 'Không đúng định dạng',
            'password.required' => 'Chưa nhập password',

            
        ];
    }
}
