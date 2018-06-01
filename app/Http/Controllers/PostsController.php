<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Texts_user;


class PostsController extends Controller
{
    protected $user;
	protected $link;
	
	public function __construct($length = 7) {
		$this->ref = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}
	
	public function show($link) {
		
		//$article = Article::find($id);
		
		//SELECT 'id','title','text'  WHERE id = $id
		$text = Texts_user::select(['link','caption','text'])->where('link',$link)->first();
		
		//dump($article);
		
		return view('text-content')->with([
									'text' => $text
									
									]);
		
	}
	
	
	
	
	
	
	public function add() {
		return view('mainPage')->with([
									'ref'=>$this->ref,
									'user' => $this->user
									]);
	}
	
	public function store(Request $request) {
		$this->validate($request, [
		
			'caption' => 'required|max:255|nullable',
			'text' => 'required'
		
		]);
		$data = $request->all();
		if (Auth::user())
		{
			$data['user'] = Auth::user()->name;
		}
		else{
			$data['user'] ='Guest';
		}
		$data['link'] = $this->ref;
		$text = new Texts_user;
		$text->fill($data);
		$text->save();

		return redirect()->action(
  		'PostsController@show', ['link' => $this->ref]
		);
		
		///
		///
		
	}
}
