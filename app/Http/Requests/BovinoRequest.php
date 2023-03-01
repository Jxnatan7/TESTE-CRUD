<?php

namespace App\Http\Requests;

use App\Models\Models\ModelBovino;
use Illuminate\Foundation\Http\FormRequest;

class BovinoRequest extends FormRequest
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
        return [
            "peso"=>"required",
            "leiteProduzido"=>"required",
            "racaoConsumida"=>"required",
            "data_nasc"=>"required"
        ];
    }

    public function messages()
    {
        return [
            "codigo.unique"=>"Já existe um bovino com este código!",
            "codigo.required"=>"Preencha o campo CÓDIGO",
            "peso.required"=>"Preencha o campo PESO",
            "leiteProduzido.required"=>"Preencha o campo LEITE",
            "racaoConsumida.required"=>"Preencha o campo RAÇÃO",
            "data_nasc.required"=>"Preencha o campo DATA DE NASCIMENTO",
        ];
    }
}
