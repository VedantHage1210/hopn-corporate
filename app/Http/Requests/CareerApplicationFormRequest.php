<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerApplicationFormRequest extends FormRequest
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
            'cover_letter' => ['nullable', 'string', 'max:5000'],
            'cv'           => [
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:' . config('hopn.uploads.max_document_size', 10240),
            ],
            'gdpr'         => ['accepted'],
            'honeypot'     => ['nullable', 'max:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'cv.required'   => 'Please upload your CV (PDF or Word document).',
            'cv.mimes'      => 'CV must be a PDF or Word document (.pdf, .doc, .docx).',
            'cv.max'        => 'CV file size must not exceed 10 MB.',
            'gdpr.accepted' => 'You must accept the privacy policy to submit your application.',
            'honeypot.max'  => 'Spam detected.',
        ];
    }
}
