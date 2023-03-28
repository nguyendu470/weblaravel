<?php

namespace App\Http\Services;

use App\Models\Employe;
use App\Models\Customer;
use App\Models\CustomerMail;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\DB;

class CustomerServices{
    public function id_employe(){
        return DB::table('users')->get();
    }

    public function store($request){
        try{
            $id = Customer::insertGetId([
                'employe_id'=>(int)$request->input('employe_id'),
                'customer_name'=>(string)$request->input('name'),
                'phone'=>(string)$request->input('phone'),
                'status'=>(int)$request->input('status'),
                'address'=>(string)$request->input('address'),
            ]);
            
                CustomerMail::create([
                    'customer_id'=>$id,
                    'mail'=>(string)$request->input('email'),
                ]);
            FacadesSession::flash('success','Thêm thành công!');
            
        }
        catch (\Exception $err){
            FacadesSession::flash('error','Thêm không thành công!');
            return false;
            
        }
    }

    public function list(){
        // return DB::table('customer')->join('customer_mail', 'customer.id', '=', 'customer_mail.customer_id')->get('customer_mail.mail');
        // DB::table('customer')->join('customer_mail', 'customer.id', '=', 'customer_mail.customer_id')->get('customer_mail.mail');
        return DB::table('customer')->get();
    }

    public function mail(){
        return DB::table('customer_mail')->get();
    }
    
    public function postemail($request){
        if((int)$request->input('customer_id')==0){
            FacadesSession::flash('error','Bạn chưa chọn khách hàng');
        }else{
            try{
                CustomerMail::create([
                    'customer_id'=>(int)$request->input('customer_id'),
                    'mail'=>(string)$request->input('addemail'),
                    ]);
                    FacadesSession::flash('success','Thêm thành công!');
                    
                }
                catch (\Exception $err){
                    FacadesSession::flash('error','Thêm không thành công!');
                    return false;
                    
                }
        }
        
    }
    
    public function deletechecked($request){
         $ids=$request->id;
         DB::table('customer')->whereIn('id',$ids)->delete();
         DB::table('customer_mail')->whereIn('customer_id',$ids)->delete();
         FacadesSession::flash('success','Xóa thành công!');
        }
        
        public function editcustomer($id){
            return DB::table('customer')->where('id',$id)->get();
            // return DB::table('customer')->get();
        }

        public function editcustomer_mail($id){
            return DB::table('customer_mail')->where('customer_id',$id)->get();
            // return DB::table('customer')->get();
        }

        public function customer($id){
            return DB::table('customer')->where('id',$id)->get();
        }
        
        public function update($request){
            $id=(int)$request->input('mail_id');
            if($id==0){
                FacadesSession::flash('error','bạn chưa chọn email cần cập nhật');
            }else{
                try{
                    $update = DB::table('customer_mail')->where('id', $id)->update([
                        'mail'=>(string)$request->input('updatemail'),
                ]);
                    FacadesSession::flash('success','cập nhật thành công');
                    
                }
                catch (\Exception $err){
                    FacadesSession::flash('error','Thêm không thành công!');
                    return false;
                    
                }
                return true;
            }
            
        }
    }