<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class BaseModel extends Model
{

    public function __get($name)
    {
        if(isset($this->localeStrings) && in_array($name, $this->localeStrings)) {

            $currentLocale = app()->getLocale();

            if ($currentLocale == 'en') {

                if (!is_null($this->{$name . '_en'})) {
                    return $this->{$name . '_en'};
                }

                return $this->{$name . '_ar'};

            } else {

                if (!is_null($this->{$name . '_ar'})) {
                    return $this->{$name . '_ar'};
                }

                return $this->{$name . '_en'};
            }
        }

        return parent::__get($name);

    }


    public function setSlugEnAttribute($value)
    {
        return $this->attributes['slug_en'] = slug($value);
    }
    public function setSlugArAttribute($value)
    {
        return $this->attributes['slug_ar'] = slug($value);
    }


}
