<?php namespace App\Http\Controllers;

use App\categories;
use App\books;
use App\pages;
use App\objects;
use App\states;
use App\Videos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

use Illuminate\Pagination\LengthAwarePaginator;
use Auth;


class commonController extends Controller
{
	public function __construct(){

		@$this->data = '';
		@$user = Auth::user();
		@$this->data->cUserId = $user->id;
		@$this->data->cUserNmae = $user->name;
		@$this->data->cUserEmail = $user->email;
		@$this->data->cUserType = $user->user_typ;
    
  }
}