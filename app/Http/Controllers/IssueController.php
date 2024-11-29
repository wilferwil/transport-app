<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    public function showNotificationForm()
    {
        $user = Auth::user();
        
        if ($user->account_type !== 'transportadora') {
            return redirect()->back()->withErrors(['error' => 'Acesso negado. Apenas transportadoras podem acessar esta página.']);
        }
        
        return view('issues.notification-form');
    }

    public function submitNotification(Request $request)
    {
        $request->validate([
            'order_number' => 'required',
            'description' => 'required|string|max:1000',
            'type' => 'required|in:extravio,avaria',
        ]);

        $user = Auth::user();

        if ($user->account_type !== 'transportadora') {
            return redirect()->back()->withErrors(['error' => 'Acesso negado.']);
        }

        Issue::create([
            'user_id' => $user->id,
            'order_number' => $request->order_number,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        return redirect()->route('issues.form')->with('success', 'Notificação registrada com sucesso.');
    }
}
