<?php

namespace App\Http\Controllers;

use App\Http\Requests\AspirationEmailRequest;
use App\Http\Requests\AspirationRequest;
use App\Mail\AspirationLinkEmail;
use App\Models\Aspiration;
use App\Models\AspirationLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AspirationController extends Controller
{
    public function index()
    {
        return Inertia::render('Aspiration');
    }

    public function storeEmail(AspirationEmailRequest $request)
    {
        try {
            $token = Str::random(5);
            $url = URL::signedRoute('aspiration.create', ['token' => $token]);
            Mail::to($request->email)
                ->send(new AspirationLinkEmail($url));
        } catch (\Exception $exception) {
            return $exception;
        }

        try {
            AspirationLink::create([
                'link' => $url,
                'token' => $token,
                'email' => $request->email
            ]);

        } catch (\Exception $exception) {
            return $exception;
        }
        return to_route('welcome');
    }

    public function create(Request $request, $token)
    {
        if (!$request->hasValidSignature()) {
            abort(403);
        }
        return Inertia::render('AspirationCreate', compact('token'));
    }

    public function store(AspirationRequest $request, $token)
    {
        try {
            $linkToken = AspirationLink::where('token', $token)->first();
            Aspiration::create([
                'name' => $request->name,
                'npm' => $request->npm,
                'email' => $linkToken->email,
                'aspiration' => $request->aspiration
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }
        $linkToken->delete();

        return to_route('welcome');
    }
}
