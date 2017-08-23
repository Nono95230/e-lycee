<?php

namespace App\Presenters;

use Carbon\Carbon;

trait DatePresenter
{

    public function getPublishedAtAttribute($date)
    {
        if (isset($date)) {
            return $this->getDateFormated($date);
        }
        return 'Non Publié';        
    }
    public function getCreatedAtAttribute($date)
    {
        return $this->getDateFormated($date);
    }

    public function getUpdatedAtAttribute($date)
    {
        return $this->getDateFormated($date);
    }

    private function getDateFormated($date)
    {
        return Carbon::parse($date)->format(config('app.locale') == 'fr' ? "d/m/Y à H:i:s" : "m/d/Y");
    }

}