<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:120'],
            'email'        => ['required', 'email', 'max:190'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'company'      => ['nullable', 'string', 'max:120'],
            'message'      => ['required', 'string', 'min:10', 'max:5000'],
            'gdpr'         => ['accepted'],
            'honeypot'     => ['nullable', 'string'],   // spam trap — must be empty
            'utm_source'   => ['nullable', 'string', 'max:100'],
            'utm_medium'   => ['nullable', 'string', 'max:100'],
            'utm_campaign' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'gdpr.accepted'    => 'You must accept the privacy policy to proceed.',
            'honeypot.max'     => 'Spam detected.',
            'message.min'      => 'Please provide a more detailed message (at least 10 characters).',
        ];
    }
}
