<?php


//Only for create Permission

use App\Http\Controllers\Admin\Topics\QuestionsController;
use App\Http\Livewire\Admin\Topics\EditTopic;
use App\Http\Livewire\Admin\Topics\Questions;
use App\Http\Livewire\Admin\Topics\ReorderQuestions;
use App\Http\Livewire\Admin\Topics\TopicList;

Route::group(['middleware' => 'permission:create'], function () {

    Route::get('questions/add',[QuestionsController::class,'index'])->name('questions.add');
    Route::post('questions/add',[QuestionsController::class,'store'])->name('questions.store');
});

//Only for edit Permission
Route::group(['middleware' => 'permission:edit'], function () {

    Route::get('topics-list/edit/{id}', EditTopic::class)->name('topic.edit');

    Route::get('questions/edit/{id}', [QuestionsController::class,'edit'])->name('questions.edit');
    Route::post('questions/edit/{id}', [QuestionsController::class,'update'])->name('questions.update');
    Route::get('questions/reorder', [QuestionsController::class,'reorder'])->name('questions.reorder');
    Route::get('questions/reorder/{id}', ReorderQuestions::class)->name('questions.reorder.list');
});

//Only for list permission
Route::group(['middleware' => 'permission:list'], function () {

    Route::get('topics-list', TopicList::class)->name('topic.list');

    Route::get('questions', Questions::class)->name('topic.questions');
    Route::get('questions/view/{id}',[QuestionsController::class,'view'])->name('questions.view');
});

//Only for delete permission
Route::group(['middleware' => 'permission:delete'], function () {

    Route::post('questions/delete/{id}',[QuestionsController::class,'delete'])->name('questions.delete');
});
