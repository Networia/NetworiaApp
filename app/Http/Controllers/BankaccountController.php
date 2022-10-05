<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BankaccountRequest;
use App\Models\Bankaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BankaccountController extends Controller
{
    public function index()
    {
        return view('content.bankaccount.table');
    }

    public function api()
    {
        $model = Bankaccount::query();
        return \DataTables::eloquent($model)
        ->toJson();
    }

    public function list_select(Request $data)
    {
        $item = Bankaccount::where('name', 'like', '%'.$data->q.'%')->get();
        $itemCount =  $item->count();
        //? create if not find
        //if ($itemCount == 0) {
        //    $item [] = ['id' =>  $data->q,'name' => $data->q];
        //    $itemCount = 1;
        //}

        return ['total_count' => $itemCount , 'item'=> $item];
    }

    public function create()
    {
        return view('content.bankaccount.add');
    }

    public function store(BankaccountRequest $data)
    {
        Bankaccount::create($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('bankaccount'));
    }

    public function edit($id)
    {
        $last = Bankaccount::findOrFail($id);

        return view('content.bankaccount.edit',['last' => $last]);
    }

    public function update(BankaccountRequest $data)
    {
        $user = Bankaccount::findOrFail($data->id);

        $user->update($data->toArray());

        session()->flash('toastr', ['type' => 'success' , 'title' => __('toastr.title.success') , 'contant' =>  __('toastr.contant.success')]);
        return redirect(route('bankaccount'));
    }
}
