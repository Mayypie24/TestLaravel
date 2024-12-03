<?php

namespace App\Http\Controllers;

use App\Services\FonateService;
use Illuminate\Http\Request;

class FonateController extends Controller
{
    protected $fonateService;

    public function __construct(FonateService $fonateService)
    {
        $this->fonateService = $fonateService;
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'message' => 'required',
        ]);

        try {
            $response = $this->fonateService->sendMessage($request->phone, $request->message);

            return response()->json(['success' => true, 'response' => $response]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
