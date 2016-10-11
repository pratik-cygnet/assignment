<?php
/**
 * User Model
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'gender'];

    /**
     * Get the files for the user.
    */
   
    public function file()
    {
        return $this->hasMany('App\User_files');
    }

    /**
     * Get total files for a particular user
     * @return [int]
     */
    public function getTotalFiles()
    {
        return $this->hasMany('App\User_files')->whereUserId($this->user_id)->count();
    }
}