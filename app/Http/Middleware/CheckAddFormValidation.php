<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Validator;

use Closure;

class CheckAddFormValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'summary' => 'required',
            'description' => 'required',
        ],  [
            'title.required' => 'Please enter title.',
            'title.max' => 'Title should be less than 255 character.',
            'summary' => 'Please enter summary.',
            'description' => 'Please enter description.',
        ]);
        if ($validator->fails()) {
            return redirect('add-blog')
                    ->withErrors($validator)
                    ->withInput();
        }
        return $next($request);
    }
}
