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
		
		$text = Texts_user::select(['link','caption','text','user'])->where('link',$link)->first();
		return view('text-content')->with([
									'text' => $text
									
									]);
	
	}
	public function delete($link) {
		if (Auth::user())
		{
			Texts_user::where('link',$link)->delete();
		}
		return redirect()->action(
  		'HomeController@index', ['/home']
		);
	
	}
	
	
	
	public function add() {
		$text = Texts_user::select(['link','user','caption'])->get();
		return view('mainPage')->with([
									'texts' => $text
									]);
	}
	
	public function store(Request $request) {
		$this->validate($request, [
		
			'caption' => 'max:255|nullable',
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
		if ($data['caption']== null)
		{
			$data['caption']= 'Без названия';
		}
		$data['link'] = $this->ref;
		$text = new Texts_user;
		$text->fill($data);
		$text->save();

		return redirect()->action(
  		'PostsController@show', ['link' => $this->ref]
		);
		
	}
	
	
	public function restore(Request $request, $link) {
		$text = Texts_user::select()->where('link',$link)->first();
		$data = $request->all();
		$this->validate($request, [
		
			'text' => 'required'
		
		]);
		if (Auth::user())
		{
			$text['text'] = $data['text'];
			$text->save();
		}

		return redirect()->action(
  		'PostsController@show', ['link' => $link]
		);
		
	}
}
