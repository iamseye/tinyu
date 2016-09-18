<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class indexInfoRequest extends Request
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
            'video_path'=>'required',
            'video_title'=>'required',
            'video_content'=>'required'
        ];
    }
}
