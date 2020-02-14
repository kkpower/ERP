<?php 
namespace Home\Model;
use Think\Model;

class SupplierModel extends Model{

	 //查询用户单一id信息
	 function getSupplier($data){
	     $supplierlist=$this->where($data)->find();

         return $supplierlist;
     }



     function deleteSupplier($data){

        $dellist['id']=$data;
         $dellist=$this->where($dellist)->find();
         $dellist['state']=0;
         return $this->save($dellist);


     }

     //搜索供应商主页
    function listSupplier($map,$pagen=10,$limit=true){
        $map['supplier.status'] = 1;
        $result=array();
        $map['status_ex.table'] = 'supplier';
        $map['status_ex.column'] = 'type';
        $map['payment.table'] = 'supplier';
        $map['payment.column'] = 'payment';
        $count=$this
            ->field('
            supplier.state as status,
            supplier.id as id,
            supplier.snumber as snumber,
            supplier.name as name,
            supplier.type as type,
            supplier.payment as payment,
            supplier.thumb as thumb,
            status_ex.namezh as namezh,
            status_ex.name as nameus,
            payment.namezh as namech,
            payment.name as nameuk
            ')
            ->where($map)
            ->join('LEFT JOIN status_ex ON supplier.type = status_ex.val')
            ->join('LEFT JOIN status_ex as payment ON supplier.payment = payment.val')
            ->count();
        $Page = getPage($count,$pagen);
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
        if($limit)
        {
            $firstRow = $Page->firstRow;
            $listRow = $Page->listRows;
        }else
        {
            $firstRow = 0;
            $listRow = $count;
        }
        $list=$this
            ->field('
             supplier.state as status,
             supplier.id as id,
            supplier.snumber as snumber,
            supplier.name as name,
            supplier.type as type,
            supplier.payment as payment,
            supplier.thumb as thumb,
            status_ex.namezh as namezh,
            status_ex.name as nameus,
            payment.namezh as namech,
            payment.name as nameuk
            ')
            ->where($map)
            ->join('LEFT JOIN status_ex ON supplier.type = status_ex.val')
            ->join('LEFT JOIN status_ex as payment ON supplier.payment = payment.val')
            ->limit($firstRow.','.$listRow)
            ->select();
        $result['list']=$list;
        $result['page']=$Page->show();
        return $result;
    }

}




 ?>