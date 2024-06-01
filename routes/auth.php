<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\PostEditController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PostController;
use App\Models\Bookmark;
use App\Models\Follows;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    
    Route::get('/home', [PostEditController::class, 'index']);

    Route::get('/followUp/{id}', [PostController::class, 'followUp'])->name('followUp.get');
Route::post('/followUp/{id}', [PostController::class, 'followUp'])->name('followUp.post');

    Route::post('/add-comment', [PostController::class, 'addComment'])->name('add.comment');

    Route::post('/sub-comment', [PostController::class, 'subComment'])->name('add.comment');

    Route::get('/detail-post/{kode_post}', [PostController::class, 'detail_post']);

    Route::post('/upload-profile', [PostController::class, 'aploud_profile']);

    Route::resource('/posts', PostEditController::class);

    Route::post('/search-btn', [PostEditController::class, 'search']);

    Route::get('/bookmark', function(){
        $userId = Auth::id();
        return view('Bookmarks',[
            'bookmarks' => Bookmark::where('user_id',$userId)->get()
        ]);
    });

    Route::get('/post/like/{kode_post}',[PostController::class,'likePost']);


    Route::get('/notif',[PostController::class,'notification']);

    Route::get('/add-post', function () {
        return view('AddNewPost');
    });

    Route::get('/following',[PostController::class,'following']);

    Route::get('/add-bookmark/{kode_post}', [PostController::class, 'addBookmark'])->name('add-bookmark');

    Route::get('/search', function () {
        $currentUserId = Auth::id();
        $followedUserIds = Follows::where('follower_id', $currentUserId)->pluck('followed_id')->toArray();
        $users = User::whereNotIn('id', $followedUserIds)
                     ->where('id', '!=', $currentUserId)
                     ->take(3)
                     ->get();
        return view('Search',[
            'results' =>  $users = User::take(3)->get(),
            'recommend' => $users
        ]);
    });
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);
});
