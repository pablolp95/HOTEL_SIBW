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
        IntranetPromotionsView::print_index($list);
    }
    public function create(){
        IntranetPromotionsView::print_create();
    }
    public function store(){
        if( isset($_POST['name'],$_POST['code'], $_POST['price'])){
            $promotion = new Promotion($_POST['name'], $_POST['description'], $_POST['code'], $_POST['price']);
            $promotions = new Promotions();
            if($promotions->save($promotion)){
                header("Location: /?page=intranet&section=promotions");
            }
            else{
                header("Location: /?page=intranet&section=promotions&action=create");
            }
        }

    }
    public function show($id){
        $promotions = new Promotions();
        $promotion = $promotions->find($id);
        IntranetPromotionsView::print_show($promotion);
    }
    public function edit($id){

        $promotions = new Promotions();
        $promotion = $promotions->find($id);
        IntranetPromotionsView::print_edit($promotion);
    }
    public function update($id){
        if( isset($_POST['name'],$_POST['code'], $_POST['price'])){
            $promotion = new Promotion($_POST['name'], $_POST['description'], $_POST['code'], $_POST['price']);
            $promotion->setId($id);
            $promotions = new Promotions();
            if($promotions->update($promotion)){
                header("Location: /?page=intranet&section=promotions");
            }
            else{
                header("Location: /?page=intranet&section=promotions&action=edit&id='.$id.");
            }
        }
    }
    public function delete($id){
        $promotions = new Promotions();
        if($promotions->delete($id)){
            header("Location: /?page=intranet&section=promotions");
        }
    }
    public function allPromotions(){
        $promotions = new Promotions();
        $list = $promotions->all();

        return $list;
    }

    public function findByCode($code){
        $promotions = new Promotions();
        $promotion = $promotions->findByCode($code);

        return $promotion;
    }

}