<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingApplicationFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'               => ['required', 'string', 'max:120'],
            'email'              => ['required', 'email', 'max:190'],
            'phone'              => ['nullable', 'string', 'max:30'],
            'program_of_interest'=> ['nullable', 'string', 'max:255'],
            'message'            => ['required', 'string', 'min:10', 'max:5000'],
            'gdpr'               => ['accepted'],
            'honeypot'           => ['nullable', 'max:0'],
            'utm_source'         => ['nullable', 'string', 'max:100'],
            'utm_medium'         => ['nullable', 'string', 'max:100'],
            'utm_campaign'       => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'gdpr.accepted' => 'You must accept the privacy policy to proceed.',
            'honeypot.max'  => 'Spam detected.',
        ];
    }
}
