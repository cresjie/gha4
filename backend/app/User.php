<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static public function createRules()
    {
        return [
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8',
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required'
        ];
    }


    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);

        return $this;
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);

        return $this;
    }

    public function getProfileImgLinksAttribute($value)
    {
        $img = $this->profile_img ?: $this->defaultProfileImg;
        $baseLink = Config::get('upload.image.profile_img.link');

        $sizes = [];

        foreach( Config::get('upload.image.profile_img.sizes') as $sizeName => $sizeInfo) {
            $sizes[$sizeName] = "{$baseLink}/{$sizeInfo['directory']}/$img";

        }
       
       return $sizes;
   
    }

    public function getProfileImgPathsAttribute($value)
    {
        $img = $this->attributes['profile_img'] ?: $this->defaultProfileImg;
        $basePath  = Config::get('upload.image.profile_img.path');

        $sizes = [];
        foreach(Config::get('upload.image.profile_img.sizes') as $sizeName => $sizeInfo ) {
             $sizes[$sizeName] = "{$basePath}/{$sizeInfo['directory']}/$img";
        }

        return $sizes;

        
    }



    public function toArray()
    {
        $attrs = parent::toArray();
        $attrs['profile_img_links'] = $this->profile_img_links;

        return $attrs;
    }
}
