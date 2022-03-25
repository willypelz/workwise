<?php

namespace App\Http\Resources\v1\Articles;

use App\Http\Resources\v1\Transformer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends Transformer
{
    /**
     * Transform the resource into an array.
     *
     * @param $data
     * @return array
     */
    public function transform($data)
    {
        if (is_array($data)) $data = (object)$data;

        $response_data = [
            'name' => $data->name,
            'author' => $data->author,
            'text' => $data->text,
            'publication_date' => $data->publication_date,
            'created_at' => $data->created_at,
            'updated_at' => $data->updated_at
        ];

        if (isset($data->hide_id) && $data->hide_id) {
            return $response_data;
        } else {
            $data_ = ['id' => $data->id];
            return array_merge($data_, $response_data);

        }
    }

    /**
     * @param $data
     * @return array
     */
    public function formatToArray($data)
    {
        return array_filter(explode(',', $data));
    }
}
