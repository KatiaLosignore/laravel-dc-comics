<?php

namespace App\Http\Requests\Comic;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string|max:65535',
            'thumb' => 'required|url|max:255',
            'price' => 'required|numeric|min:0|max:9999',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string',
        ];
    }

    public function messages() {
        return [
            'title.required' => "Il campo Titolo è richiesto",
            'title.string' => "Il campo inserito deve essere di tipo stringa",
            'description.string' => "Il campo inserito deve essere di tipo stringa",
            'description.max' => "La descrizione deve essere lunga al massimo 65535 caratteri",
            'thumb.required' => "Url dell'immagine richiesta",
            'thumb.url' => "L'url dell'immagine deve essere valida, esempio: http://www.miosito.com",
            'thumb.max' => "L'url dell'immagine deve essere al massimo di 255 caratteri",
            'price.required' => "Il campo Prezzo è richiesto",
            'price.numeric' => "Il prezzo deve essere un valore numerico",
            'price.min' => "Il prezzo minimo deve essere :min",
            'price.max' => "Il prezzo massimo deve essere :max",
            'series.required' => "Il campo Serie è richiesto",
            'series.string' => "Il campo inserito deve essere di tipo stringa",
            'sale_date.required' => "Il campo Data di pubblicazione è richiesto",
            'sale_date.date' => "È necessario inserire una data valida",
            'type.required' => "Il campo Tipo è richiesto",
            'type.string' => "Il campo inserito deve essere di tipo stringa",                 
        ];
    }
}


