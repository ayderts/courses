<?php

namespace App\Voyager\Controllers;

use App\Voyager\ContentTypes\JsonOneFieldOptionContentType;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class JsonOneFieldOptionController extends VoyagerBaseController
{
    public function getContentBasedOnType(Request $request, $slug, $row, $options = null)
    {
        switch ($row->type) {
            case 'json_one_field_option':
                return (new JsonOneFieldOptionContentType($request, $slug, $row, $options))->handle();
            default:
                return Controller::getContentBasedOnType($request, $slug, $row, $options);
        }
    }
}
