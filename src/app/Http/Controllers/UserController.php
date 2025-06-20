<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Http\Requests\StoreWeightLogRequest;
use App\Http\Requests\WeightTargetRequest;
use App\Http\Requests\UpdateWeightLogRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use App\Actions\Fortify\CreateNewUser;


class UserController extends Controller
{

    //ログイン
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('weight.logs');
        } else {
            return redirect()->back()->withErrors(['email' => 'メールアドレスまたはパスワードが正しくありません。']);
        }
    }

    //会員登録画面表示
    public function registerStep1()
    {
        return view('auth.registerStep1');
    }
    
    //会員登録    
    public function createUser()
    {
        $user = app(CreateNewUser::class)->create(request()->all());

        auth()->login($user);
        
        return redirect()->route('register.step2.get');
    }

    //初期目標体重登録画面表示
    public function registerStep2()
    {
        return view('auth.registerStep2');
    }

    //初期体重・目標体重の登録
    public function register(StoreWeightLogRequest $request)
    {
        $validated = $request->validated();
        $user = auth()->user();

        // WeightLogとWeightTargetを作成
        WeightLog::create([
            'user_id' => $user->id,
            'weight' => $validated['weight'],
            'date' => now(), 
            'calories' => 0, // 初期値
            'exercise_time' => '00:00:00', // 初期値
            'exercise_content' => '', // 初期値
        ]);

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $validated['target_weight'],
        ]);

        return redirect()->route('weight.logs')->with('success', '体重データを登録しました！');
    }

    //weightLog画面表示
    public function weightLogs()
    {
        $datas = WeightLog::where('user_id', auth()->id())->paginate(8);

        $targetWeight = DB::table('weight_targets')->where('user_id', auth()->id())->value('target_weight');

        $latestWeight = DB::table('weight_logs')->where('user_id', auth()->id())->orderBy('date', 'desc')->value('weight');

        $weightDifference = $targetWeight - $latestWeight;
      
        return view('log', compact('datas', 'targetWeight', 'latestWeight', 'weightDifference'));
    }

    //検索
    public function  search(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = WeightLog::where('user_id', auth()->id());

        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('date', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('date', '<=', $endDate);
        }

        $datas = $query->orderBy('date', 'desc')->paginate(10);

        $searchData = !empty($startDate) || !empty($endDate);

        $targetWeight = WeightTarget::where('user_id', auth()->id())->value('target_weight');
        $latestWeight = WeightLog::where('user_id', auth()->id())->latest('date')->value('weight');
        $weightDifference = $targetWeight - $latestWeight;

        return view('log', compact('datas', 'startDate', 'endDate', 'searchData', 'targetWeight', 'latestWeight', 'weightDifference'));
    }

    //体重登録
    public function store(StoreWeightLogRequest $request) 
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        WeightLog::create($data);

        return redirect('/weight_logs');
    }

    //体重更新
    public function update(UpdateWeightLogRequest $request, $weightLogId)
    {
        $validated = $request->validated();
        $weightLog = WeightLog::findOrFail($weightLogId);
        $weightLog->update($validated);

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
    public function goalSetting(WeightTargetRequest $request)
    {
        $validated = $request->validated();
        $user = auth()->user();

        $target = WeightTarget::where('user_id', $user->id)->first();

        if ($target) {
            $target->update([
                'target_weight' => $validated['target_weight'],
            ]);
        } else {
            WeightTarget::create([
                'user_id' => $user->id,
                'target_weight' => $validated['target_weight'],
            ]);
        }

        return redirect('/weight_logs');
    }

    //ログアウト
    public function logout()
    {
        auth()->logout(); 
        return redirect('/login'); 
    }
    
}
