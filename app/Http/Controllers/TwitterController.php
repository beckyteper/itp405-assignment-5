<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Tweet;

class TwitterController extends Controller
{
    public function create() {
        // $tweets = DB::table('tweets')
        //     ->orderBy('id', 'DESC')
        //     ->get();

        $tweets = Tweet::orderBy('id', 'DESC')->get();

        return view('create', [
            'tweets' => $tweets
        ]);
    }

    public function store(Request $request) {
        $validation = Validator::make($request->all(),
        [
            'tweet' => 'required|max:140'
        ]);

        if ($validation->passes()) {
            // DB::table('tweets')->insert([
            //     'tweet' => request('tweet')
            // ]);

            Tweet::insert([
              'tweet' => request('tweet')
            ]);

            return redirect('/')
                ->with('successStatus', 'Tweet was successfully created!');
        } else {
            return redirect('/')
                ->withInput()
                ->withErrors($validation);
        }
    }

    public function destroy($tweetID) {
        // DB::table('tweets')
        //     ->where('id', '=', $tweetID)
        //     ->delete();

        $tweet = Tweet::find($tweetID);
        $tweet->delete();

        return redirect('/')
            ->with('successStatus', 'Tweet was successfully deleted!');
    }

    public function singleTweet($tweetID) {
        // $tweets = DB::table('tweets')
        //     ->where('id', '=', $tweetID)
        //     ->get();

        $tweet = Tweet::find($tweetID);

        return view('singleTweet', [
            'tweet' => $tweet
        ]);
    }

    public function edit($tweetID) {
        $tweet = Tweet::find($tweetID);

        return view('edit', [
            'tweet' => $tweet
        ]);
    }

    public function update(Request $request, $tweetID) {
      $validation = Validator::make($request->all(),
      [
          'tweet' => 'required|max:140'
      ]);

      if ($validation->passes()) {
          $tweet = Tweet::find($tweetID);
          $tweet->tweet = request('tweet');
          $tweet->save();

          return redirect("tweets/$tweetID")
              ->with('successStatus', 'Tweet was updated successfully!');
      } else {
          return redirect("/tweets/$tweetID/edit")
              ->withErrors($validation);
      }
    }
}
