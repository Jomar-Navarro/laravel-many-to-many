<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The project title is required.',
            'title.max' => 'The project title can\'t have more 255 character.',
            'description.required' => 'The project description is required',
            'project_url.url' => 'L\'URL del progetto deve essere un URL valido.',
            // 'image.image' => 'L\'immagine deve essere un file immagine.',
            // 'image.mimes' => 'L\'immagine deve essere di uno dei seguenti formati: jpeg, png, jpg, gif.',
            // 'image.max' => 'L\'immagine non può superare i 2 MB di dimensioni.',
        ];
    }
}
