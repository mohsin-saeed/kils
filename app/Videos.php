<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Validator;
//use App\books_materialController;

class Videos extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'videos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','title', 'description','url','thumbnail'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function tokenize($url){
        $token=explode("=",$url);
        $thumbnail_token=$token[count($token) - 1];
        //$thumbnail= "https://i.ytimg.com/vi/".$thumbnail_token."/hqdefault.jpg";
        return $thumbnail_token;
    }

    public function validateVideo(array $data){
        return Validator::make($data, [
            'title' => 'required',
            'url'=>'required|unique:videos',
            'description'=>'required'

        ]);

    }
    public function validateEditVideo(array $data){
        return Validator::make($data, [
            'title' => 'required',
            'url'=>'required',
            'description'=>'required'

        ]);

    }



}
