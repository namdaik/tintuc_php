<?php
include('controller.php');
include('model/m_tintuc.php');
include('model/pager.php');


class C_tintuc extends Controller{
	function index()
	{
		// Model
		$m_theloai = new M_tintuc();
		$theloai=$m_theloai->getTheloai();
		$slide = $m_theloai->getSlide();
		$arrayName = array('theloai' =>$theloai,'slide'=>$slide);
		return $this->loadView('index',$arrayName);
	}

	/*function getTinByIdLoai(){
		$id_loai = $_GET['id_loai'];
		$m_tintuc = new M_tintuc();
		$tin = $m_tintuc->getTintuc($id_loai);
		$loatin = $m_tintuc->getLoaiTinById($id_loai);
		$theloai = $m_tintuc->getTheloai();
		return $array = array('tintuc'=>$tin,'loatin'=>$loatin,'theloai'=>$theloai);
	}*/
	function getTinByIdLoai(){
		$id_loai = $_GET['id_loai'];
		$m_tintuc = new M_tintuc();
		$tin = $m_tintuc->getTintucPhantrang($id_loai);

		$currentPage    = (isset($_GET['page'])) ? $_GET['page'] : 1;
	    $pagination     = new pagination(count($tin),$currentPage,5,4); //tổng số trang,trang hien tai,so phần tử trên trang, số trang sẽ hiển thị
	    $paginationHTML = $pagination->showPagination();
	    $position       = ($currentPage-1)*$pagination->_nItemOnPage;

		$tin = $m_tintuc->getTintucPhantrang($id_loai,$position, $pagination->_nItemOnPage);

		$loaitin = $m_tintuc->getLoaiTinById($id_loai);
		$theloai = $m_tintuc->getTheloai();
		$array = array('tintuc'=>$tin,'loaitin'=>$loaitin,'theloai'=>$theloai, 'list'=>$paginationHTML);
		return $this->loadView('loaitin',$array);
	}

	function getChitietTin(){
		$m_tintuc = new M_tintuc();
		$id_tin = $_GET['id_tin'];
		$tin = $m_tintuc->getTintucById($id_tin);
		$comment = $m_tintuc->getComment($id_tin);
		$loaitin = $_GET['loai_tin'];
		$tinlienquan = $m_tintuc->getRelatedNews($loaitin);
		$tinnoibat = $m_tintuc->getTinNoibat();
		$tin = array('tintuc'=>$tin,'comment'=>$comment,'tinlienquan'=>$tinlienquan,'tinnoibat'=>$tinnoibat);
		return $this->loadView('chitiet',$tin);
	}

	function them_binh_luan($id_user,$id_tin,$noidung){
		$m_tintuc = new M_tintuc();
        $tin = $m_tintuc->addComment($id_user,$id_tin,$noidung);
		header("location:" . $_SERVER['HTTP_REFERER']);
	}
	function timkiem($key){
		$m_tintuc = new M_tintuc();
		$tin = $m_tintuc->search($key);
		return $tin;
	}
}

?>