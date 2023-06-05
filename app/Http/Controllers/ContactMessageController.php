<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreContactMessageRequest;


class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactMessage::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactMessageRequest $request) : JsonResponse
    {
        $validated = $request->validated();

        $contactMessage = new ContactMessage;

        $contactMessage->name = $validated['contactName'];
        $contactMessage->email = $validated['contactEmail'];
        $contactMessage->phone = $validated['contactPhone'];
        $contactMessage->message = $validated['contactMessage'];

        $contactMessage->save();

        return response()->json([
            'toast' => view('components.toast', [
                'title' => 'Tudo certo!',
                'message' => 'Recebemos a sua mensagem e em breve retornaremos.'
            ])->render(),
        ], 200);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
