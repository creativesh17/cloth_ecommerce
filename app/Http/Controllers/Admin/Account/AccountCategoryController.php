<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountCategory;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AccountCategoryController extends Controller
{
    public function all()
    {
        // return AccountCategory::get();
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }

        $query = AccountCategory::where('status', $status)->orderBy($orderBy, $orderByType);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', $key)
                    ->orWhere('title', $key)
                    ->orWhere('title', 'LIKE', '%' . $key)
                    ->orWhere('id', 'LIKE', '%' . $key);
            });
        }

        $data = $query->paginate($paginate);
        return response()->json($data);
    }

    public function show($id)
    {
        $data = AccountCategory::where('id', $id)->first();
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
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            // 'url' => ['required', 'unique:categories', 'min:3'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // $data = AccountCategory::create($request->all());
        $data = new AccountCategory();
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->save();

        return response()->json($data, 200);
    }

    public function canvas_store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new AccountCategory();
        $data->title = request()->title;
        $data->slug = Str::slug(request()->title);
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = AccountCategory::find(request()->id);
        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->title = request()->title;
        $data->update();

        return response()->json($data, 200);
    }

    public function canvas_update()
    {
        $data = AccountCategory::find(request()->id);

        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['user_role not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->title = request()->title;
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:account_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = AccountCategory::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:account_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'account category does not exist',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = AccountCategory::find(request()->id);

        $data->delete();

        return response()->json('Account category deleted successfully');
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:account_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = AccountCategory::find(request()->id);
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
            $check = AccountCategory::where('id', $item->id)->first();
            if (!$check) {
                try {
                    AccountCategory::create((array) $item);
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
        $account_category_json = AccountCategory::where('status', 1)->select(['id', 'title'])->get();
        return response()->json($account_category_json);
    }

    public function income_expense() {
        $allCategory = AccountCategory::query()
        ->withSum(['account_log_income', 'account_log_expense'], 'amount')
        ->get();
        return $allCategory;
    }

    // public function check_exists()
    // {
    //     $check = AccountCategory::where('url', request()->url)->first();
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
    //     $accountCategory = AccountCategory::find($id);
    //     if ($accountCategory->is_top_category) {
    //         $accountCategory->is_top_category = 0;
    //         $accountCategory->save();
    //         return response()->json(0);
    //     } else {
    //         $accountCategory->is_top_category = 1;
    //         $accountCategory->save();
    //         return response()->json('success');
    //     }
    // }

    public function add_to_home_cat()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'category not exists',
                'errors' => $validator->errors(),
            ], 422);
        }

        $id = request()->id;
        $accountCategory = AccountCategory::find($id);
        if ($accountCategory->is_home_category) {
            $accountCategory->is_home_category = 0;
            $accountCategory->save();
            return response()->json(0);
        } else {
            $accountCategory->is_home_category = 1;
            $accountCategory->save();
            return response()->json('success');
        }
    }

    public function add_to_nav_cat()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'category not exists',
                'errors' => $validator->errors(),
            ], 422);
        }

        $id = request()->id;
        $accountCategory = AccountCategory::find($id);
        if ($accountCategory->is_nav_category) {
            $accountCategory->is_nav_category = 0;
            $accountCategory->save();
            return response()->json(0);
        } else {
            $accountCategory->is_nav_category = 1;
            $accountCategory->save();
            return response()->json('success');
        }
    }
}
