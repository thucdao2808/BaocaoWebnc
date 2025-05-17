<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    //
    public function index(){
        $settings = Setting::paginate(5);
        return view('project_1.admin.settings.index', compact('settings'));

    }
    public function create(){

        return view('project_1.admin.settings.create');
    }
   public function store(Request $request){
        $name = $request->name;
        $value = $request->value;

        Setting::create([
            'name' => $name,
            'value' => $value,
        ]);
         return redirect()->route('settings.create')->with('success', 'Thêm setting thành công');

        
   }
   public function edit($id){
        $setting = Setting::findOrFail($id);
        return view('project_1.admin.settings.update',compact('setting'));
   }
   public function update($id,Request $request){
        $setting = Setting::findOrFail($id);

        $setting->update([
            'name' => $request->input('name'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('settings.index')->with('success', 'Cập nhật thành công!');
   }
   public function destroy($id){
        $setting = Setting::findOrFail($id);
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Xóa cài đặt thành công!');
    }
}
