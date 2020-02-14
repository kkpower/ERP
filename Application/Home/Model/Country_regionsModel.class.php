<?php
namespace Home\Model;
use Think\Model;

class Country_regionsModel extends Model
{
    //根据地区获取国家
    public function country_area($area){
        $area['country_regions.status']=1;
        $list=$this
            ->field('country_regions.area,
                     country.countryus,
                     country.countryzh,
                     country.id as cid')
            ->join('LEFT JOIN country ON country.id = country_regions.c_id')
            ->where($area)
            ->select();
        return $list;
    }
}