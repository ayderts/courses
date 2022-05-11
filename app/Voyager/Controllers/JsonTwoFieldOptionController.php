<?php

namespace App\Voyager\Controllers;

use App\Voyager\ContentTypes\JsonTwoFieldOptionContentType;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\Controller;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class JsonTwoFieldOptionController extends VoyagerBaseController
{
    public function getContentBasedOnType(Request $request, $slug, $row, $options = null)
    {
        switch ($row->type) {
            case 'json_two_field_option':
                return (new JsonTwoFieldOptionContentType($request, $slug, $row, $options))->handle();
            default:
                return Controller::getContentBasedOnType($request, $slug, $row, $options);
        }
    }
}
