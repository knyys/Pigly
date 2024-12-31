<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeightLogRequest;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;


class UserController extends Controller
{
    //会員登録画面表示
    public function registerStep1()
    {
        return view('auth.registerStep1');
    }
    
    //会員登録    
    public function createUser(WeightLogRequest $request)
    {
        $validated = $request->validated();

        $user = app(CreateNewUser::class)->create($validated);

        auth()->login($user);
        
        return redirect()->route('register.step2.get');
    }

    //初期目標体重登録画面表示
    public function registerStep2()
    {
        return view('auth.registerStep2');
    }

    //初期体重・目標体重の登録
    public function register(WeightLogRequest $request)
    {
        $validated = $request->validated();
        $user = auth()->user();

        // WeightLogとWeightTargetを作成
        WeightLog::create([
            'user_id' => $user->id,
            'weight' => $validated['weight'],
        ]);

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $validated['target_weight'],
        ]);

        return view('/weight_logs',['success', '体重データを登録しました！']);
    }

    //ログアウト
    public function logout()
    {
        auth()->logout(); 
        return redirect('/login'); 
    }

    //weightLog画面表示
    public function weightLogs()
    {
        $datas = WeightLog::where('user_id', auth()->id())->paginate(8);

        $targetWeight = DB::table('WeightTarget')->where('user_id', auth()->id())->value('target_weight');

        $latestWeight = DB::table('WeightLog')->where('user_id', auth()->id())->orderBy('date', 'desc')->value('weight');

        $weightDifference = $targetWeight - $latestWeight;
      
        return view('log', compact('datas', 'targetWeight', 'latestWeight', 'weightDifference'));
    }


    //検索
    public function  search(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = WeightLog::query();
        if ($startDate && $endDate) {
        $query->whereBetween('date', [$startDate, $endDate]);
        }

        $datas = $query->paginate(10);
       
        $searchData = !empty($startDate) && !empty($endDate);

        return view('log', compact('datas', 'startDate', 'endDate', 'searchData'));
    }

    //体重登録
    public function store(WeightLogRequest $request) 
    {
        $validated = $request->validated();
        $user = auth()->user();
        
        WeightLog::create($validated);
        
        return redirect('/weight_logs');
    }

    //体重更新
    public function update(WeightLogRequest $request)
    {
        $data = $request->all();
        WeightLog::find($request->id)->update($data);

        return redirect('/weight_logs');
    }

    //体重削除
    public function destroy(Request $request)
    {
        WeightLog::find($request->id)->delete();

        return redirect('/weight_logs');
    }

    //目標設定画面表示
    public function goalSettingPage()
    {
        return view('goal');
    }

    //目標設定
    public function goalSetting(WeightLogRequest $request)
    {
        $validated = $request->validated();

        $user = auth()->user();

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $validated['target_weight'],
        ]);
        
        return redirect('/weight_logs');
    }
    
}
