<?php

namespace App\Voyager\ContentTypes;

use TCG\Voyager\Http\Controllers\ContentTypes\BaseType;

class JsonOneFieldOptionContentType extends BaseType
{
    public function handle()
    {
        $value = $this->request->input($this->row->field);

        $new_parameters = [];
        foreach ($value as $key => $val) {
            if ($value[$key]['field_one']) {
                $new_parameters[] = array_merge($value[$key], ['index' => $key + 1]);
            }
        }

        return $new_parameters;
    }
}
