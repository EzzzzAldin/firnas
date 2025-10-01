<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChatbotController extends Controller
{
    public function getQuestions(): JsonResponse
    {
        $questions = Question::select('id', 'question_text', 'type', 'options', 'priority')
            ->orderBy('priority', 'asc')
            ->get();

        return response()->json($questions);
    }

    public function authenticateUser(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'full_phone' => ['required', 'string', 'max:20'],
        ]);

        // First, log out any existing user to clear the session.
        // This is the crucial step to prevent session conflicts.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Find the user by full_phone or create a new one.
        $user = User::firstOrCreate(
            ['phone' => $validated['full_phone']],
            [
                'name' => $validated['name'],
                'password' => Hash::make($validated['phone']),
                'type' => 'user',
            ]
        );

        // If the user already exists, update their name.
        if (!$user->wasRecentlyCreated) {
            $user->update(['name' => $validated['name']]);
        }

        // Now, log in the correct, newly-created or updated user.
        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'تم مصادقة المستخدم بنجاح',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'phone' => $user->phone,
            ]
        ]);
    }
    public function history()
    {
        $userId = auth()->id();

        $questions = Question::with(['answers' => function ($q) use ($userId) {
            $q->where('user_id', $userId);
        }])->get();

        return response()->json($questions);
    }



    public function storeAnswer(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'question_id' => ['required', 'exists:questions,id'],
            'answer_text' => ['required', 'string', 'max:1000'],
        ]);

        // Ensure user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'المستخدم غير مُصادق عليه'
            ], 401);
        }

        $answer = Answer::updateOrCreate(
            [
                'question_id' => $validated['question_id'],
                'user_id' => Auth::id(),
            ],
            [
                'answer_text' => $validated['answer_text'],
            ]
        );

        return response()->json([
            'message' => 'Answer saved successfully',
            'data' => $answer,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();


        return response()->json([
            'success' => true,
            'message' => 'تم تسجيل الخروج بنجاح'
        ]);
    }
}
