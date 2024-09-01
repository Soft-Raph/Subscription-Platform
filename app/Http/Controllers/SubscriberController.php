<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * @param Request $request
     * @param Website $website
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function subscribe(Request $request, Website $website) {
        $rules = [
            'email' => [
                'required',
                'email',
                'unique:subscribers,email,NULL,id,website_id,' . $website->id,
            ],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $subscriber = $website->subscribers()->create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Subscribed successfully!',
        ], 201);
    }

}
