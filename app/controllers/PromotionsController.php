<?php
include_once '../app/models/Promotions.php';
include_once '../app/models/Promotion.php';
include_once '../resources/views/intranet/IntranetPromotionsView.php';
include_once '../app/controllers/Controller.php';

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $p=new Promotions();
        $list = $p->all();
       IPromotionsView::print_index($list);
    }
    public function create(){
        IPromotionsView::print_create();
    }
    public function store(){
        if( isset($_POST['name']) && isset($_POST['code']) && isset($_POST['description']) ){
            $pro=new Promotion($_POST['name'],$_POST['code'],$_POST['description']);
            $p=new Promotions();
            if($p->save($pro)){
                header("Location: /?page=intranet&section=promotions");
            }
            else{
                header("Location: /?page=intranet&section=promotions&action=create");
            }
        }

    }
    public function show($id){
        $pro=new Promotions();
        $promocion=$pro->find($id);
        IPromotionsView::print_show($promocion);
    }
    public function edit($id){

            $u=new Promotions();
            $promotion=$u->find($id);
            IPromotionsView::print_edit($promotion);


    }
    public function update($id){
        if( isset($_POST['name1']) && isset($_POST['code1']) && isset($_POST['description1']) ){
            $pro=new Promotion($_POST['name1'],$_POST['code1'],$_POST['description1']);
            $pro->set_id($id);
            $p=new Promotions();
            if($p->update($pro)){
                header("Location: /?page=intranet&section=promotions");

            }
            else{
                header("Location: /?page=intranet&section=promotions&action=edit&id={$pro->get_id()}");

            }
        }
    }
    public function delete($id){
        $pro=new Promotions();
        if($pro->delete($id)){
            header("Location: /?page=intranet&section=promotions");
        }
    }

}