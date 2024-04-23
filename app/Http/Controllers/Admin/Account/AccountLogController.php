<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountCategory;
use App\Models\AccountLog;
use App\Models\AccountLogAttachment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AccountLogController extends Controller
{
    public function all()
    {
        // return AccountLog::get();
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }

        $query = AccountLog::where('status', $status)
            ->with([
                'account_category',
                'account_log_attachment'
            ])
            ->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', $key)
                    ->orWhere('account_category_id', $key)
                    ->orWhere('account_category_id', 'LIKE', '%' . $key)
                    ->orWhere('amount', $key)
                    ->orWhere('amount', 'LIKE', '%' . $key)
                    ->orWhere('date', $key)
                    ->orWhere('date', 'LIKE', '%' . $key)
                    ->orWhere('type', $key)
                    ->orWhere('type', 'LIKE', '%' . $key)
                    ->orWhere('id', 'LIKE', '%' . $key);
            });
        }

        $data = $query->paginate($paginate);
        return response()->json($data);
    }

    public function show($id)
    {
        $data = AccountLog::where('id', $id)
            ->with([
                'account_category',
                'account_log_attachment'
            ])->first();

        if (!$data) {
            return response()->json([
                'err_message' => 'not found',
                'errors' => ['role' => ['data not found']],
            ], 422);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(request()->all(), [
            'amount' => ['required'],
            'type' => ['required'],
            'account_category_id' => ['required'],
            'date' => ['required']
            // 'url' => ['required', 'unique:logs', 'min:3'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        // $data = AccountLog::create($request->all());
        $data = new AccountLog();
        $data->account_category_id = $request->account_category_id;
        $data->amount = $request->amount;
        $data->type = $request->type;
        $data->amount_in_text = numbers_to_text($data->amount) ?? NULL;
        $data->date = Carbon::now()->toDateString();
        $data->description = $request->description ?? NULL;
        $data->save();

        if (request()->hasFile('images')) {
            $files = request()->images;
            foreach ($files as $file) {
                $ac_attachment = new AccountLogAttachment();
                $ac_attachment->account_category_id = request()->account_category_id;
                $ac_attachment->account_log_id = $data->id;
                $ac_attachment->file = Storage::putFile('uploads/accounts', $file);
                $ac_attachment->save();
            }
        }

        return response()->json($data, 200);
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'amount' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new AccountLog();
        $data->account_category_id = request()->account_category_id;
        $data->amount = request()->amount;
        $data->type = request()->type;
        $data->amount_in_text = request()->amount_in_text ?? NULL;
        $data->date = Carbon::now()->toDateString();
        $data->description = request()->description ?? NULL;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = AccountLog::find(request()->id);
        // dd(request()->all());
        // dd($data);
        $validator = Validator::make(request()->all(), [
            'amount' => ['required'],
            'type' => ['required'],
            'account_category_id' => ['required'],
            'date' => ['required']
            // 'files.*' => 'required|file|mimes:jpg,jpeg,png,pdf',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }



        $data->account_category_id = request()->account_category_id;
        $data->amount = request()->amount;
        $data->amount_in_text = request()->amount_in_text ?? NULL;
        $data->type = request()->type ?? 'income';
        $data->date = Carbon::now()->toDateString();
        $data->description = request()->description ?? NULL;
        $data->update();

        // $data = AccountLog::create($request->all());

        if (request()->hasFile('images')) {
            $files = request()->images;
            AccountLogAttachment::where('account_log_id', $data->id)->delete();
            foreach ($files as $file) {
                $ac_attachment = new AccountLogAttachment();
                $ac_attachment->account_category_id = request()->account_category_id;
                $ac_attachment->account_log_id = $data->id;
                $ac_attachment->file = Storage::putFile('uploads/accounts', $file);
                $ac_attachment->save();
            }
        }

        return response()->json($data, 200);
    }




    public function canvas_update()
    {
        $data = AccountLog::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['user_role not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'amount' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->account_category_id = request()->account_category_id;
        $data->amount = request()->amount;
        $data->amount_in_text = request()->amount_in_text ?? NULL;
        $data->date = Carbon::now()->toDateString();
        $data->description = request()->description;
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:account_logs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = AccountLog::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:account_logs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'account log does not exist',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = AccountLog::find(request()->id);

        $data->delete();

        return response()->json('Account log deleted successfully');
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:account_logs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = AccountLog::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }

    

    public function bulk_import()
    {
        $validator = Validator::make(request()->all(), [
            'data' => ['required', 'array'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        foreach (request()->data as $item) {
            $item['created_at'] = $item['created_at'] ? Carbon::parse($item['created_at']) : Carbon::now()->toDateTimeString();
            $item['updated_at'] = $item['updated_at'] ? Carbon::parse($item['updated_at']) : Carbon::now()->toDateTimeString();
            $item = (object) $item;
            $check = AccountLog::where('id', $item->id)->first();
            if (!$check) {
                try {
                    AccountLog::create((array) $item);
                } catch (\Throwable $th) {
                    return response()->json([
                        'err_message' => 'validation error',
                        'errors' => $th->getMessage(),
                    ], 400);
                }
            }
        }

        return response()->json('success', 200);
    }

    public function all_json()
    {
        $account_log_json = AccountLog::where('status', 1)->get();
        return response()->json($account_log_json);
    }

    // public function check_exists()
    // {
    //     $check = AccountLog::where('url', request()->url)->first();
    //     if ($check && request()->has('category')) {
    //         if ($check->url == request()->category['url']) {
    //             return 'not exists';
    //         }
    //     }
    //     if ($check) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'errors' => [
    //                 'url' => ['this url is exists']
    //             ],
    //         ], 422);
    //     }
    // }

    // public function add_to_top_cat()
    // {
    //     $validator = Validator::make(request()->all(), [
    //         'id' => ['required', 'exists:categories,id'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'category not exists',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     $id = request()->id;
    //     $AccountLog = AccountLog::find($id);
    //     if ($AccountLog->is_top_category) {
    //         $AccountLog->is_top_category = 0;
    //         $AccountLog->save();
    //         return response()->json(0);
    //     } else {
    //         $AccountLog->is_top_category = 1;
    //         $AccountLog->save();
    //         return response()->json('success');
    //     }
    // }

    // public function add_to_home_cat()
    // {
    //     $validator = Validator::make(request()->all(), [
    //         'id' => ['required', 'exists:categories,id'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'category not exists',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     $id = request()->id;
    //     $AccountLog = AccountLog::find($id);
    //     if ($AccountLog->is_home_category) {
    //         $AccountLog->is_home_category = 0;
    //         $AccountLog->save();
    //         return response()->json(0);
    //     } else {
    //         $AccountLog->is_home_category = 1;
    //         $AccountLog->save();
    //         return response()->json('success');
    //     }
    // }

    // public function add_to_nav_cat()
    // {
    //     $validator = Validator::make(request()->all(), [
    //         'id' => ['required', 'exists:categories,id'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'category not exists',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     $id = request()->id;
    //     $AccountLog = AccountLog::find($id);
    //     if ($AccountLog->is_nav_category) {
    //         $AccountLog->is_nav_category = 0;
    //         $AccountLog->save();
    //         return response()->json(0);
    //     } else {
    //         $AccountLog->is_nav_category = 1;
    //         $AccountLog->save();
    //         return response()->json('success');
    //     }
    // }



}
