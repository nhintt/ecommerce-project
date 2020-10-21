<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\City;
use App\Province;
use App\Wards;
use App\Feeship;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class DeliveryController extends Controller
{
	public function update_delivery(Request $request, $fee_id){
		$data = $request->all();
		$fee_ship = Feeship::find($fee_id);
		$fee_value = rtrim($data['fee_value'],'.');
		$fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();

        Session::put('message','Cập nhật phí vận chuyển thành công');
        return Redirect::to('select-feeship');
    }
    public function edit_delivery($fee_id){
        $edit_delivery = Feeship::where('fee_id',$fee_id)->get();
        $manager_delivery = view('admin.delivery.edit_delivery')->with('edit_delivery',$edit_delivery);

        return view('admin_layout')->with('admin.delivery.edit_delivery', $manager_delivery);
    }
    public function delete_feeship($fee_id){
    	$fee_ship = Feeship::find($fee_id);
    	$fee_ship->delete();
    	Session::put('message','Xóa phí vận chuyển thành công');
        return Redirect::to('select-feeship');
    }
	public function select_feeship(Request $request){
		$feeship = Feeship::orderby('fee_id','DESC')->get();
        return view('admin.delivery.list_delivery')->with(compact('feeship'));

	}
	public function insert_delivery(Request $request){
		$data = $request->all();
		$fee_ship = new Feeship();
		$fee_ship->fee_matp = $data['city'];
		$fee_ship->fee_maqh = $data['province'];
		$fee_ship->fee_xaid = $data['wards'];
		$fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();

        Session::put('message','Thêm phí vận chuyển thành công');
        return Redirect::to('add-delivery');
	}
    public function add_delivery(Request $request){
    	$city = City::orderby('matp','ASC')->get();
    	return view('admin.delivery.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_province as $key => $province){
    				$output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
    			}

    		}else{

    			$select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			$output.='<option>---Chọn xã phường---</option>';
    			foreach($select_wards as $key => $ward){
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
    			}
    		}
    		echo $output;
    	}

    }

}
