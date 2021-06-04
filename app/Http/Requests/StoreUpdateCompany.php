<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $uuid = $this->company;

        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', "unique:companies,name,{$uuid},uuid"],
            'whatsapp' => ['required', "unique:companies,whatsapp,{$uuid},uuid"],
            'email' => ['required', 'email', "unique:companies,email,{$uuid},uuid"],
            'phone' => ['nullable', "unique:companies,phone,{$uuid},uuid"],
            'facebook' => ['nullable', "unique:companies,facebook,{$uuid},uuid"],
            'instagram' => ['nullable', "unique:companies,instagram,{$uuid},uuid"],
            'youtube' => ['nullable', "unique:companies,youtube,{$uuid},uuid"],
        ];
    }
}
