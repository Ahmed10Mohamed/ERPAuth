<?php

namespace App\Lib;

class Permissions
{
    private $Permissions = array(

         'Admin'=>array(
            'admins'=>'Admin',
        ),
        'School'=>array(
            'schools'=>'School',
        ),'User'=>array(
            'users'=>'User',
        ),'Clothes'=>array(
            'clothes'=>'Clothes',
        ),'Logs'=>array(
            'logs'=>'Logs',
        ),'Report'=>array(
            'reports'=>'Report',
        ),'Achievement'=>array(
            'achievements'=>'Achievement',
        ),'Games'=>array(
            'games'=>'Games',
        ),'GamesCategories'=>array(
            'games_cat'=>'GamesCategories',
        ),'Grade'=>array(
            'grades'=>'Grade',
        ),'Translate'=>array(
            'translates'=>'Translate',

        ),'Faq'=>array(
            'faqs'=>'Faq',
        ),'Package'=>array(
            'packages'=>'Package',
        ),'Category'=>array(
            'categories'=>'Category',
        ),'Course'=>array(
            'Course'=>'Course',
        ),'Steeks'=>array(
            'Steek'=>'Steeks',
        ),'countries'=>array(
            'countries'=>'countries',
        ),'teachers'=>array(
            'teachers'=>'teachers',
        ),'tags'=>array(
            'tags'=>'tags',
        )



    );


    public function all_permissions()
    {
        return $this->Permissions;
    }

    public function permissions_group($permission)
    {
        return $this->Permissions[$permission];
    }
}
