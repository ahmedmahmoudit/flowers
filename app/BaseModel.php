<?php namespace App;

use Carbon\Carbon;
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

    public function scopeDaily($query)
    {
        return $query->where('created_at', '>=', Carbon::today()->toDateString())
            ->where('created_at', '<', Carbon::tomorrow()->toDateString());
    }

    public function scopeMonthly($query)
    {
        return $query->where('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())
            ->where('created_at', '<', Carbon::now()->endOfMonth()->toDateString());
    }

    public function scopeYearly($query)
    {
        return $query->whereYear('created_at', date('Y'));
    }


}
