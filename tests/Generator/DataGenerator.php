<?php

namespace Tests\Generator;

use App\Models\Sport\BaseModel;
use App\Models\Sport\Lang;

class DataGenerator
{
    public static function getDataForAdmin()
    {
        return [
            'title' => [
                'eng' => 'eng',
                'rus' => 'rus',
                'deu' => 'deu',
                'spa' => 'spa',
                'por' => 'por',
            ]
        ];
    }

    public static function getDataForAdminWrong()
    {
        return [
            'title' => [
                'eng' => 'eng',
                'rus' => 'rus',
                'deu' => 'deu',
                //'spa' => 'spa',
                //'por' => 'por',
            ]
        ];
    }

    public static function getDataForAdminForStrings()
    {
        return [
            'name' => 'NewName',
            'title' => [
                'eng' => 'eng',
                'rus' => 'rus',
                'deu' => 'deu',
                'spa' => 'spa',
                'por' => 'por',
            ]
        ];
    }

    public static function createLangs()
    {
        Lang::create(
            [
                'code' => 'eng',
                'name' => 'English'
            ]
        );
        Lang::create(
            [
                'code' => 'rus',
                'name' => 'Русский'
            ]
        );
        Lang::create(
            [
                'code' => 'deu',
                'name' => 'Deutsch'
            ]
        );
        Lang::create(
            [
                'code' => 'spa',
                'name' => 'Español'
            ]
        );
        Lang::create(
            [
                'code' => 'por',
                'name' => 'Português'
            ]
        );
    }

    public static function editDataForAdmin(BaseModel $baseModel)
    {
        $baseModel::create(
            [
                'code' => '1',
                'lang' => 'eng',
                'name' => 'NameEnglish'
            ]
        );
        $baseModel::create(
            [
                'code' => '1',
                'lang' => 'rus',
                'name' => 'NameРусский'
            ]
        );
        $baseModel::create(
            [
                'code' => '1',
                'lang' => 'deu',
                'name' => 'NameDeutsch'
            ]
        );
        $baseModel::create(
            [
                'code' => '1',
                'lang' => 'spa',
                'name' => 'NameEspañol'
            ]
        );
        $baseModel::create(
            [
                'code' => '1',
                'lang' => 'por',
                'name' => 'NamePortuguês'
            ]
        );

    }

    public static function updateDataForAdmin(BaseModel $baseModel)
    {
        $count = $baseModel::first()->id;
        return  [
            'eng' => $baseModel::find($count)->name . 666666,
            'rus' => $baseModel::find($count+1)->name,
            'deu' => $baseModel::find($count+2)->name,
            'spa' => $baseModel::find($count+3)->name,
            'por' => $baseModel::find($count+4)->name,
        ];
    }

}
