<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        // $this->redirect = url()->previous() . '#comment-form';
        
        return [
            'text' => 'required|min:3|max:750'
        ];
    }
}
