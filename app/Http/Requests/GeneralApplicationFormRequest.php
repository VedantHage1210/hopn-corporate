<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * "Send Your CV" — open / spontaneous application that is not tied to a job.
 */
class GeneralApplicationFormRequest extends FormRequest
{
    public const EXPERIENCE = ['0-1', '1-3', '3-5', '5-10', '10+'];

    public const INTERESTS = [
        'Engineering & Software',
        'AI & Data',
        'Digital Twins & Industry 4.0',
        'Consulting & Strategy',
        'Research & Innovation',
        'Product & Design',
        'Sales, Partnerships & Operations',
        'Other',
    ];

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
            'experience'   => ['required', 'in:' . implode(',', self::EXPERIENCE)],
            'interest'     => ['required', 'in:' . implode(',', self::INTERESTS)],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'message'      => ['nullable', 'string', 'max:5000'],
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
        $lang = $this->route('lang', 'en');
        $t = [
            'en' => [
                'cv.required'         => 'Please upload your CV (PDF or Word document).',
                'cv.mimes'            => 'CV must be a PDF or Word document (.pdf, .doc, .docx).',
                'cv.max'              => 'CV file size must not exceed 10 MB.',
                'gdpr.accepted'       => 'You must accept the privacy policy to submit your application.',
                'experience.required' => 'Please select your experience level.',
                'interest.required'   => 'Please select your area of interest.',
                'linkedin_url.url'    => 'Please enter a valid URL (starting with https://).',
            ],
            'de' => [
                'cv.required'         => 'Bitte laden Sie Ihren Lebenslauf hoch (PDF oder Word-Dokument).',
                'cv.mimes'            => 'Der Lebenslauf muss ein PDF- oder Word-Dokument sein (.pdf, .doc, .docx).',
                'cv.max'              => 'Der Lebenslauf darf höchstens 10 MB groß sein.',
                'gdpr.accepted'       => 'Bitte stimmen Sie der Datenschutzerklärung zu, um Ihre Bewerbung zu senden.',
                'experience.required' => 'Bitte wählen Sie Ihre Berufserfahrung aus.',
                'interest.required'   => 'Bitte wählen Sie Ihr Interessengebiet aus.',
                'linkedin_url.url'    => 'Bitte geben Sie eine gültige URL ein (beginnend mit https://).',
            ],
            'ar' => [
                'cv.required'         => 'يرجى رفع سيرتك الذاتية (PDF أو مستند Word).',
                'cv.mimes'            => 'يجب أن تكون السيرة الذاتية بصيغة PDF أو Word (‎.pdf, .doc, .docx).',
                'cv.max'              => 'يجب ألا يتجاوز حجم الملف 10 ميغابايت.',
                'gdpr.accepted'       => 'يجب الموافقة على سياسة الخصوصية لإرسال طلبك.',
                'experience.required' => 'يرجى اختيار مستوى خبرتك.',
                'interest.required'   => 'يرجى اختيار مجال اهتمامك.',
                'linkedin_url.url'    => 'يرجى إدخال رابط صحيح (يبدأ بـ https://).',
            ],
        ];
        return $t[$lang] ?? $t['en'];
    }
}
