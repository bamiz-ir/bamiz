<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('Admin.Comments.index');
    }

    public function edit(Comment $comment)
    {
        return view('Admin.Comments.edit' , compact('comment'));
    }

    public function NotApproved()
    {
        return view('Admin.Comments.notApproved');
    }
}
