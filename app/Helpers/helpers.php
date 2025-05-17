<?php

 function getConfigValueFromSettingTable($configKey){

    $setting = \App\Models\Setting::where('name',$configKey)->first();
    if(!empty($setting)){
        return $setting->value;
    } 
    return null;
 }