<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CustomerServices;
use App\Http\Requests\Customer\AddRequest;
use App\Http\Requests\Customer\EmailRequest;
use App\Http\Requests\Customer\EditMailRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    protected $customerServices;

    public function __construct(CustomerServices $customerServices)
    {
        $this->customerServices=$customerServices;
    }

    public function create(){
        $user = Auth::user();
        $id_employe=$this->customerServices->id_employe();
        return view("pages.addcustomer",compact('id_employe','user'),['title'=>'Thêm Khách Hàng']);
        // dd($id_employe);
    }

    public function store(AddRequest $request){
        $result=$this->customerServices->store($request);
        return redirect()->route('listcustomer');
        // dd($request->input());
    }

    public function product(){
        $user = Auth::user();
        $mail=$this->customerServices->mail();
        $customer=$this->customerServices->list();
        // $edit=$this->customerServices->edit();
        return view('pages.listcustomer',compact('customer','mail','user'),['title'=>'Danh Sách Khách Hàng']);
        // dd($edit);
    }

    public function getemail($id=0){
        $customer=$this->customerServices->customer($id);
        return response()->json([
            
            'customer'=>$customer,

        ]);
    }

    public function postemail(EmailRequest $request){
        $this->customerServices->postemail($request);
        return redirect()->route('listcustomer');
        // dd($request->input());
    }

    public function getdelete(Request $request){
        $this->customerServices->deletechecked($request);
        $arr = [3, 7, 9, 5];
        return response()->json([
            'data' => $arr,
            'message' => 'xoas thanh cong',
            'error' => false,
            'success'=>"Đã xóa thành công!"
        ]);
        // return redirect()->route('listcustomer');
    }

    public function getEdit($id=0){
        $editcustomer=$this->customerServices->editcustomer($id);
        $editcustomer_mail=$this->customerServices->editcustomer_mail($id);
        return response()->json([
            'status'=>200,
            'customer'=>$editcustomer,
            'customer_mail'=>$editcustomer_mail
        ]);
        // dd($edit);
        // return view('pages.listcustomer',compact('editcustomer','editcustomer_mail'));
    }

    public function postEdit(EditMailRequest $request){
        $this->customerServices->update($request);
        return redirect()->route('listcustomer');
    }
}
