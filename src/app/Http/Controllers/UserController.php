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
    public function registerStep1()
    {
        return view('auth.registerStep1');
    }
    

    
    public function createUser(WeightLogRequest $request)
    {
        $validated = $request->validated();

        $user = app(CreateNewUser::class)->create($validated);

        auth()->login($user);
        
        return redirect()->route('register.step2.get');
    }

    public function registerStep2()
    {
        return view('auth.registerStep2');
    }

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
        public function logout()
    {
        auth()->logout(); 
        return redirect('/login'); 
    }

    public function weightLogs()
    {
        $datas = WeightLog::paginate(8);
        return view('log', compact('datas'));

    }

    
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

    public function goalSetting()
    {
        return view('goal');
    }


    
}
