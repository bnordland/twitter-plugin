<?php namespace RainLab\Twitter\Components;

use System\Classes\ApplicationException;
use Cms\Classes\ComponentBase;
use RainLab\Twitter\Classes\Twitter;
use Cache;

class Favorites extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'Twitter favorite messages',
            'description' => 'Outputs a list of Twitter favorite messages.'
        ];
    }

    public function defineProperties()
    {
        return [
            'count' => [
                'description' => 'Number of messages to display',
                'title' => 'Count',
                'default' => 10,
                'type'=>'string',
                'validationPattern'=>'^[0-9]+$',
                'validationMessage'=>'The Count value is required and should be integer.'
            ],
            'random' => [
                'description' => 'Display messages in random order',
                'title' => 'Random',
                'default' => false,
                'type'=>'checkbox'
            ]
        ];
    }

    public function favoriteList()
    {
        $favorites = Twitter::instance()->listFavorites();

        if (!$this->property('random'))
            return array_slice($favorites, 0, $this->property('count'));

        $randomKeys = array_rand($favorites, $this->property('count'));

        if (!is_array($randomKeys))
            $randomKeys = [$randomKeys];

        $result = [];

        foreach ($randomKeys as $key)
            $result[] = $favorites[$key];

        return $result; 
    }
}