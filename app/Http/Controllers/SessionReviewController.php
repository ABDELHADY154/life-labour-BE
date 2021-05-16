<?php

namespace App\Http\Controllers;

use App\Session;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = [];
        $dbReviews = DB::table('student_session_reviews')->get();
        foreach ($dbReviews as $rev) {
            $post = Session::find($rev->session_id);
            $review = $post->studentReviews()->where('student_id', $rev->student_id)->first();
            $viewArr = [
                'student' => $review,
                'post' => $post,
                'review' => $review->pivot
            ];
            $reviews[] = $viewArr;
        }
        return view('admin.sessionReview.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = DB::table('student_session_reviews')->where('id', $id)->first();
        if ($review) {
            $post = Session::find($review->session_id);
            $student = Student::find($review->student_id);
            return view('admin.sessionReview.show', [
                'student' => $student,
                'post' => $post,
                'review' => $review
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = DB::table('student_session_reviews')->where('id', $id)->delete();
        return redirect(route('sessionReview.index'));
    }
}