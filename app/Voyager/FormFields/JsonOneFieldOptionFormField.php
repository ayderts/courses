<?php

namespace App\Voyager\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class JsonOneFieldOptionFormField extends AbstractHandler
{
    protected $codename = 'json_one_field_option';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view("vendor.voyager.formfields.{$this->codename}", [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent,
        ]);
    }
}
