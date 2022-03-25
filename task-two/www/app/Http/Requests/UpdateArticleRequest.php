<?php

namespace App\Http\Requests;

use App\Library\Traits\ValidationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateArticleRequest
{


    use ValidationTrait;


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function validate($request)
    {
        $validator = Validator::make($request->all(),   [
               'name' => 'required|string',
               'author' => 'required|string',
               'text' => 'required|string',
               'expiry_date' => 'required|date',
               'publication_date' => 'required|date',
           ], [
               'name.required' => 'The name field is required',
               'author.required' => 'The author field is required',
               'text.required' => 'The text field is required',
               'expiry_date.required' => 'The expiry date field is required',
               'publication_date.required' => 'The publication date field is required'
           ]);
    }
}
