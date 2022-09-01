<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;
use Wkhooy\ObsceneCensorRus;

class TicketCreateRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $content = strip_tags($this->request->get('content'));
        ObsceneCensorRus::filterText($content);
        $this->request->set('content', $content);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'api_token' => '',
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|max:7',
            'ftp_credentials' => '',
        ];
    }
}
