<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Holiday;
use Illuminate\Http\Response; // 追記
use Illuminate\Support\Facades\DB; // 追記
use Illuminate\Http\RedirectResponse; // 追記
use Carbon\Carbon;


use Illuminate\View\View; // 追記


class HolidayController extends Controller
{
    //表示
    public function index(Request $request, Response $response)
    {
        $holidays = Holiday::all();
        $data = [
            'holidays' => $holidays,
        ];
        return view('vue.holiday', $data);
    }

    //検索
    public function search(Request $request, Response $response)
    {

        if ($request->input('action') === 'clear') {
            $holidays = Holiday::all();
            $data = [
                'holidays' => $holidays,
            ];
            return view('vue.holiday', $data);

        } else {
            // 数字以外（-）の文字列を削除
            $removalHyphenDate = preg_replace("/-/", "", $request->input('HolidayDate'));
            $results = Holiday::orwhere('yyyymmdd', $removalHyphenDate)
                ->orWhere('holiday_name', $request->input('HolidayName'))->get();

            $result = [
                'results' => $results,
            ];
            return view('vue.holiday', $result);
        }

    }

    public function add(Request $request, Response $response)
    {

        //バリデーション
        $request->validate([
            'addHolidayDate' => 'required',
            'addHolidayName' => 'required',
        ]);

        // フォームの入力データを取得
        $holidayDate = preg_replace("/-/", "", $request->input('addHolidayDate'));
        $holidayName = $request->input('addHolidayName');

        // データベースに休日を追加する処理
        DB::beginTransaction();
        try {
            $holiday = new Holiday();
            $holiday->fill(['yyyymmdd' => $holidayDate, 'holiday_name' => $holidayName]);
            $holiday->save();
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => '休日が追加されました',
            ]);

        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => '処理に失敗しました。' . $ex->getMessage(),
            ]);
        }

    }

}
