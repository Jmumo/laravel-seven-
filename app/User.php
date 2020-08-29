<?php

namespace App;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\support\facades\storage;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     public static function image($image){

     $filename=$image->getClientoriginalname();

     User::deleteimage();

     $image->storeAs('images',$filename,'public');

     $id = auth()->user()->id;

     User::find($id)->update(['avatar'=>$filename ]);

     }

     public static function deleteimage(){

          if(auth()->user()->avatar){

          storage::delete('/public/images/'.auth()->user()->avatar);
          }
     }

     public function todos(){

        return  $this->hasMany(todo::class);
     }
}
 