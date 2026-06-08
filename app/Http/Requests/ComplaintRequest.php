<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'content' => ['required', 'string', 'min:10'],
            'attachment' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'is_private' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => __('messages.complaint_title_required'),
            'category_id.required' => __('messages.complaint_category_required'),
            'category_id.exists' => __('messages.complaint_category_invalid'),
            'content.required' => __('messages.complaint_content_required'),
            'content.min' => __('messages.complaint_content_min'),
            'attachment.image' => __('messages.complaint_attachment_image'),
            'attachment.mimes' => __('messages.complaint_attachment_mimes'),
            'attachment.max' => __('messages.complaint_attachment_max'),
        ];
    }
}
