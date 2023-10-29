<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteStore extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombrecultivo' => 'required',
            'nombrecientifico' => 'required',
            'tipocultivo' => 'required',
            'modalidad' => 'required',
            'ciclocultivo' => 'required',
            'potencialalto' => 'required',
            'potencialmedio' => 'required',
            'potencialbajo' => 'required',
            'pdf' => 'required',
        ];
    }
}
