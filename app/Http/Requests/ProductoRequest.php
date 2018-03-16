<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
        $rules  = [
            "sku"=>"required|integer",
            "descripcion"=>"required|max:2000",
            "pais_origen"=>"required|max:200",
            "fabricante"=>"required|max:200",
            "categoria_id"=>"required|exists:categorias,id"
        ];
        if(!is_null($this->file('documentos'))){
            $documentos = count($this->file('documentos'));
            foreach(range(0, $documentos) as $index) {
                $rules['documentos.' . $index] = 'mimes:jpeg,bmp,png,pdf|max:10000';
            }
        }

        return $rules;
    }
}
