<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\VerificationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DidController;
use App\Http\Controllers\ExtController;
use App\Http\Controllers\IVRController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\QueuesController;
use App\Http\Controllers\RingController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\VoxExtensions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/password/reset', [ResetPasswordController::class, 'reset']);
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
// Route::get('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
Route::post('/login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->get('/logout', [UserController::class, 'logout']);
//  Did Countries
Route::get('/countries', [DidController::class, 'index']);
Route::post('/countries', [DidController::class, 'store']);
Route::get('/countries/{country}', [DidController::class, 'show']);
Route::get('/{country}/cities/{city}', [DidController::class, 'dids']);
Route::put('/updatedid/{did}', [DidController::class, 'updatedid']);
Route::get('/localdids', [DidController::class, 'allDids']);
// Purchase DIDs
Route::get('/{user}/allbuydids', [PurchaseController::class, 'index']);
Route::post('/allbuydids', [PurchaseController::class, 'store']);
Route::get('/diddetail/{did}', [PurchaseController::class, 'show']);
Route::put('/didupdate', [PurchaseController::class, 'update']);
// Purchase Dids further details
Route::get('/{did}/details', [PurchaseDetailController::class, 'index']);
Route::post('did_details', [PurchaseDetailController::class, 'store']);
Route::put('/diddetailupdate', [PurchaseDetailController::class, 'update']);

// Api routes for voxucm Extensions
Route::get('/accounts', [ExtController::class, 'accounts']);
Route::post('/addextension', [ExtController::class, 'addextension']);
Route::get('/allowcodec', [ExtController::class, 'allowcodec']);
Route::get('/countrylist', [ExtController::class, 'countrylist']);
Route::get('/departmentlist', [ExtController::class, 'departmentlist']);
Route::get('/dids', [ExtController::class, 'dids']);
Route::get('/dtmplist', [ExtController::class, 'dtmplist']);
Route::get('/extensiondropdownlist', [ExtController::class, 'extensiondropdownlist']);
Route::get('/extensionlist', [ExtController::class, 'extensionlist']);
// GEt Extensions
Route::get('/getextensions', [ExtController::class, 'getextensions']);
Route::put('/updateExt', [ExtController::class, 'updateExt']);
Route::get('/extensionlimit', [ExtController::class, 'extensionlimit']);
Route::get('/followme', [ExtController::class, 'followme']);
Route::get('/holidaylist', [ExtController::class, 'holidaylist']);
Route::get('/mediareinvite', [ExtController::class, 'mediareinvite']);
Route::get('/musiclist', [ExtController::class, 'musiclist']);
Route::get('/natlist', [ExtController::class, 'natlist']);
Route::get('/pickup', [ExtController::class, 'pickup']);
Route::get('/ringduraion', [ExtController::class, 'ringduraion']);
// Api routes for voxucm Ring Groups
Route::get('/ringgroup', [RingController::class, 'ringgroup']);
Route::get('/extlist', [RingController::class, 'extlist']);
Route::post('/ringaddext', [RingController::class, 'ringaddext']);
Route::delete('/ringdeltext', [RingController::class, 'ringdeltext']);
Route::post('/ringaddgroup', [RingController::class, 'ringaddgroup']);
Route::put('/ringeditgroup', [RingController::class, 'ringeditgroup']);
Route::delete('/ringedeltgroup', [RingController::class, 'ringedeltgroup']);
Route::get('/durationlist', [RingController::class, 'durationlist']);
Route::get('/failurelist', [RingController::class, 'failurelist']);
Route::get('/ivrlist', [RingController::class, 'ivrlist']);
Route::put('/updateringgroup', [RingController::class, 'updateringgroup']);
// Api routes for voxucm Voice Mail
Route::get('/voicemaillist', [VoiceController::class, 'voicemaillist']);
Route::get('/voicemaildroplist', [VoiceController::class, 'voicemaildroplist']);
Route::get('/mappedextension', [VoiceController::class, 'mappedextension']);
Route::get('/mappedextension', [VoiceController::class, 'mappedextension']);
Route::post('/addvoicemail', [VoiceController::class, 'addvoicemail']);
Route::put('/editvoicemail', [VoiceController::class, 'editvoicemail']);
Route::delete('/deltvoicemail/{id}', [VoiceController::class, 'deltvoicemail']);
// Api routes for voxucm Queues
Route::get('/queueslist', [QueuesController::class, 'queueslist']);
Route::post('/addqueues', [QueuesController::class, 'addqueues']);
Route::put('/updatequeues', [QueuesController::class, 'updatequeues']);
Route::delete('/deletequeues', [QueuesController::class, 'deletequeues']);
Route::get('/quemohlist', [QueuesController::class, 'quemohlist']);
Route::get('/queannouncelist', [QueuesController::class, 'queannouncelist']);
Route::get('/questrategylist', [QueuesController::class, 'questrategylist']);
Route::get('/queweightlist', [QueuesController::class, 'queweightlist']);
Route::get('/quemapagent', [QueuesController::class, 'quemapagent']);
Route::post('/quemapagent', [QueuesController::class, 'addquemapagent']);
Route::delete('/quedeleteagent', [QueuesController::class, 'quedeleteagent']);
Route::get('/quedroplist', [QueuesController::class, 'quedroplist']);
Route::get('/agentdroplist', [QueuesController::class, 'agentdroplist']);
Route::get('/penalitylist', [QueuesController::class, 'penalitylist']);
// Api routes for voxucm Conference
Route::get('/conflist', [ConferenceController::class, 'conflist']);
Route::post('/addconference', [ConferenceController::class, 'addconference']);
Route::put('/editconference', [ConferenceController::class, 'editconference']);
Route::delete('/deleteconference', [ConferenceController::class, 'deleteconference']);
// Api routes for voxucm IVR
Route::get('/ivrlist', [IVRController::class, 'ivrlist']);
Route::post('/addivr', [IVRController::class, 'addivr']);
Route::put('/editlist', [IVRController::class, 'editlist']);
Route::delete('/deletelist', [IVRController::class, 'deletelist']);
Route::get('/ivrretry', [IVRController::class, 'ivrretry']);
// Get Sound list
Route::get('/getsoundlist', [IVRController::class, 'getsoundlist']);
Route::get('ivrdtmpwait', [IVRController::class, 'ivrdtmpwait']);
Route::post('addivroption', [IVRController::class, 'addivroption']);
Route::delete('deleteivroption', [IVRController::class, 'deleteivroption']);
Route::get('ivrdestinations', [IVRController::class, 'ivrdestinations']);
Route::get('ivrdestinationsnumbers', [IVRController::class, 'ivrdestinationsnumbers']);
Route::get('ivrannoundestnum', [IVRController::class, 'ivrannoundestnum']);
Route::get('ivrdestinationsdrop', [IVRController::class, 'ivrdestinationsdrop']);
Route::get('ivrvoicemail', [IVRController::class, 'ivrvoicemail']);
Route::get('ivrconference', [IVRController::class, 'ivrconference']);
Route::get('ivrringgroup', [IVRController::class, 'ivrringgroup']);
Route::get('ivrqueues', [IVRController::class, 'ivrqueues']);
// to get Call Records
Route::get('/callrecords', [ExtController::class, 'callrecords']);
