<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCreateRequest extends FormRequest
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
            'content' => 'required|max:255',
            'article_id' => 'integer|required'
        ];
    }
    public function messages()
    {
        return [
            'content.required' => 'Your comment is empty! Try again...',
            'content.max' => 'Your comment is too long unlike your penis...'
        ];
    }
}
