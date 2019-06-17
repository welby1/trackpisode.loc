<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Auth;

class commentController extends Controller
{
    public function loadComments_ajax(Request $request){

    	if($request->ajax()){

    		$output = '';
        	$comment_id = $request->last_comment_id;
        	$Serie_id = $request->Serie_id;

	    	$comments = Comment::select('Comments.*', 'users.name')
            ->join('users', 'users.id', '=', 'Comments.User_id')
            ->where([
            	['Comments.Serie_id', '=',  $Serie_id],
            	['Comments.id', '<', $comment_id]
            ])
            ->orderBy('Comments.created_at', 'desc')
            ->limit(2)
            ->get();

            if(!$comments->isEmpty()){

            	foreach ($comments as $comment) {

            		$output .= '<div class="row col-lg-8">
									<div class="col-lg-12 descr-pane comment-template">
										<h5>'.$comment->name.'</h5>
										<p>'.$comment->body.'</p>
										<span class="comment-time">'.date('d M Y H:i',strtotime($comment->created_at)).'</span>
									</div>
								</div>';
            	}

            	$output .= '<div class="row col-lg-8" id="remove-row">
								<button id="btn-more" data-last-comment-id="'.$comment->id.'" class="btn-block"><h5>More Comments</h5></button>
							</div>';
				echo $output;
            }	    	
	    }
    }

    public function addComment_ajax(Request $request){

    	if($request->ajax()){

    		$response = '';

    		if(!empty($request->getCommentText)){

    			$comment = new Comment;
    			$comment->User_id = Auth::id();
    			$comment->Serie_id = $request->Serie_id;
    			$comment->body = $request->getCommentText;
    			$comment->save();

    			$response =	'<div class="row col-lg-8">
							 	<div class="col-lg-12 descr-pane comment-template">
									<h5>'.Auth::user()->name.'</h5>
									<p>'.$request->getCommentText.'</p>
									<span class="comment-time">Just now</span>
								</div>
							 </div>';
    		}

    		return Response($response);
    	}
    }
}
