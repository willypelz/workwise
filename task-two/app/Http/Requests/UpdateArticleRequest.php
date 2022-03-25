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
        $validator = Validator::make($request->all(),  [
            'name' => 'required|string',
            'isbn' => 'required|string',
            'authors' => 'required|',
            'number_of_pages' => 'required|integer',
            'publisher' => 'required|string',
            'country' => 'required|string',
            'release_date' => 'required|date',
        ], [
            'name.required' => 'The name field is required',
            'isbn.required' => 'The isbn field is required',
            'authors.required' => 'The authors field is required',
            'number_of_pages.required' => 'The number_of_pages field is required',
            'publisher.required' => 'The publisher field is required',
            'country.required' => 'The country field is required',
            'release_date.required' => 'The release_date field is required',
        ]);
    }
}
