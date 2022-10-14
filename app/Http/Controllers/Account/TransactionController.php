<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Transaction;
use App\Models\Account\Ahead;
use App\Models\Account\Admission;
use App\Models\Account\Month;
use App\Models\Account\Year;
use App\Models\Madrasha;
use App\Models\Bnumber;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
      
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banglans = Bnumber::pluck('name', 'id');
        
        $datas = Transaction::orderBy('id','DESC')->paginate(5);
        return view('account.transactions.index',compact('datas','banglans'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Transaction::get();
        $debit_aheads=Ahead::pluck('name','id');
        $credit_aheads=Ahead::pluck('name','id');
        $students=Admission::pluck('name','id');
        $months=Month::pluck('name','id');
        $years=Year::pluck('year','id');
        
        return view('account.transactions.create',compact('datas','debit_aheads', 'credit_aheads','students', 'months', 'years'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|integer',
            'tdate' => 'required',
            'debit_ahead_id' => 'required',
            'credit_ahead_id' => 'required',
        ]);
         Session::put('s_id', $request->input('subject_id'));
         Session::put('c_id', $request->input('classes_id'));


        $transactions = Transaction::create([
            'amount' => $request->input('amount'),
            'tdate' => Carbon::parse($request->input('tdate'))->format('Y-m-d H:i:s'),
            'debit_ahead_id' => $request->input('debit_ahead_id'),
            'credit_ahead_id' => $request->input('credit_ahead_id'),
            'month_id' => $request->input('month_id'),
            'year_id' => $request->input('year_id'),
            'admission_id' => $request->input('admission_id'),
            'note' => $request->input('note'),
            'user_id' => auth()->user()->id
            ]);
        // check wheather students are avaiable to entry
        
        return redirect()->route('transactions.index')
            ->with('success', trans('lang.createdsuccessfully'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transaction::find($id);
        return view('account.transactions.show',compact('data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $debit_aheads=Ahead::pluck('name','id');
        $credit_aheads=Ahead::pluck('name','id');
        $students=Admission::pluck('name','id');
        $months=Month::pluck('name','id');
        $years=Year::pluck('years','id');
        
        $data = Transaction::find($id);
        return view('account.transactions.edit',compact('data','debit_aheads', 'credit_aheads','students', 'months', 'years'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required|integer',
            'tdate' => 'required',
            'debit_ahead_id' => 'required',
            'credit_ahead_id' => 'required',
        ]);
    
        $transactions = Transaction::find($id);
        $transactions->amount = $request->input('amount');
        $transactions->tdate = $request->input('tdate');
        $transactions->debit_ahead_id = $request->input('debit_ahead_id');
        $transactions->credit_ahead_id = $request->input('credit_ahead_id');
        $transactions->note = $request->input('note');
        $transactions->admission_id = $request->input('admission_id');
        $transactions->month_id = $request->input('month_id');
        $transactions->year_id = $request->input('year_id');

        $transactions->save();
    
        return redirect()->route('transactions.index')
                        ->with('success', trans('lang.updatedsuccessfully'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("transaction")->where('id',$id)->delete();
        return redirect()->route('transactions.index')
                        ->with('warning', trans('lang.deletedsuccessfully'));
    }
    public function mrefresh(Request $request)
    {
        $request->session()->forget('s_id','c_id');

        return redirect()->route('transactions.create')
        ->with('success','Memory refreshed successfully');

    }
    public function delete($id)
    {
        $data = Transaction::find($id);

        return view('account.transactions.delete', compact('data'));
    }

    public function report() {
        $data = Madrasha::find(1);
        $datas = Transaction::orderBy('id','DESC')->get();    
        $i=0;
        return view('account.transactions.report', compact('data', 'datas','i'));
    }
}
