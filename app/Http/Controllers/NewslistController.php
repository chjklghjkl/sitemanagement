<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewslistController extends Controller
{
    //
	public function newslist(){
		$urlArticles = file_get_contents('https://newsapi.org/v2/top-headlines?sources=google-news&apiKey=fd173620ad964b4fa00ec755d640601b');
        $urlArticlesArray = json_decode($urlArticles, true);
        $articles = $urlArticlesArray['articles'];
		return view('newslist')->with(compact('articles'));
	}
}
