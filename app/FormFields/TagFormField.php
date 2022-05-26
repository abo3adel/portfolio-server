<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class TagFormField extends AbstractHandler
{
    protected $codename = 'tag';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.tag', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}