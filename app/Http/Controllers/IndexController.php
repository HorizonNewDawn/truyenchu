<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;
use App\Models\Theodoi;
use Carbon\Carbon;
use App\Models\Publisher;
use Illuminate\Support\Facades\Session;
// use Session\Session;

class IndexController extends Controller
{
    public function register_publisher(Request $request){

        $data = $request -> validate([
            'username' => 'required|unique:publishers|max:100',
            'password' => 'required|required_with:password_confirm|same:password|max:150',
            'email' => 'required|unique:publishers|max:100',
        ],[
            'username.required' => 'Tên đăng nhập không đươc để trống',
            'username.unique' => 'Tên đăng nhập tồn tại, vui lòng nhập tên khác',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập mô tả khác',
            'password.required' => 'Mật khẩu không được để trống',
        ]);
        $publisher = new Publisher();
        $publisher -> username = $data['username'];
        $publisher -> password = md5($data['password']);
        $publisher -> email = $data['email'];
        $publisher -> date_created = Carbon::now('Asia/Ho_Chi_Minh');

        $publisher ->save();
        return redirect()->back()->with('status', 'Đăng ký thành công');
    }
    public function login_publisher(Request $request){
        $data = $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Tên đăng nhập không đươc để trống',
            'password.required' => 'Mật khẩu không được để trống',
        ]);

        $publisher = Publisher::where('username',$data['username'])->where('password',md5($data['password']))->first();
        if($publisher){
            Session::put('login_publisher', true);
            Session::put('publisher_id',$publisher->id);
            Session::put('username',$publisher->username);
            Session::put('publisher_email',$publisher->email);
            return redirect()->back()->with('status', 'Đăng nhập thành công');
        }else{
            return redirect()->back()->with('error', 'Tên tài khoản hoặc mật khẩu không đúng, vui lòng nhập lại');
        }
    }
    public function theodoi(){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $truyen= Truyen::orderBy('id', 'DESC')->where('kichhoat',1)->get();
        $theodoi = Theodoi::with('publisher')->where('publisher_id',Session::get('publisher_id'))->orderBy('date_updated', 'DESC')->get();
        return view('pages.users.theodoi')->with(compact('danhmuc','truyen','theloai','theodoi'));
    }
    public function xoatheodoi($id){
        Theodoi::find($id)->delete();
        return redirect()->back()->with('status', 'Truyện đã được dừng theo dõi');
    }
    public function themtheodoi(Request $request){
        $data = $request->all();
        $theodoi = new Theodoi();
        $theodoi_check = Theodoi::where('title',$data['title'])->where('publisher_id',$data['publisher_id'])->first();
        if($theodoi_check){
            echo 'Fail';
        }else{
            $theodoi -> title = $data['title'];
            $theodoi -> image = $data['image'];
            $theodoi -> status = 0;
            $theodoi -> publisher_id = $data['publisher_id'];
            $theodoi -> save();
            echo 'Success';
        }

    }
    public function sign_out(){
        Session::forget('login_publisher');
        Session::forget('publisher_id');
        Session::forget('username');
        Session::forget('publisher_email');
        return redirect()->back()->with('status', 'Đăng xuất thành công');
    }
    public function dangky(){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $truyen= Truyen::orderBy('id', 'DESC')->where('kichhoat',1)->get();
        return view('pages.users.dangky')->with(compact('danhmuc','truyen','theloai'));
    }
    public function dangnhap(){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $truyen= Truyen::orderBy('id', 'DESC')->where('kichhoat',1)->get();
        return view('pages.users.dangnhap')->with(compact('danhmuc','truyen','theloai'));
    }
    public function home(){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $truyen= Truyen::orderBy('id', 'DESC')->where('kichhoat',1)->get();
        return view('pages.home')->with(compact('danhmuc','truyen','theloai'));
    }
    public function danhmuc($slug){

        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id','DESC')->get();
        $danhmuc_id = Danhmuc::where('slug_danhmuc',$slug)->first();
        $username = $danhmuc_id->username;
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',1)->where('danhmuc_id',$danhmuc_id->id)->get();

        return view('pages.danhmuc')->with(compact('danhmuc','truyen','username','theloai'));
    }

    public function theloai($slug){

        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id','DESC')->get();
        $theloai_id = Theloai::where('slug_theloai',$slug)->first();
        $tentheloai = $theloai_id->tentheloai;
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',1)->where('theloai_id',$theloai_id->id)->get();

        return view('pages.theloai')->with(compact('danhmuc','truyen','tentheloai','theloai'));
    }

    public function xemtruyen($slug){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();

        $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_tr',$slug)->where('kichhoat',1)->first();

        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $chapter_moinhat = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();

        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        $theodoi = Theodoi::with('publisher')->where('publisher_id',Session::get('publisher_id'))->orderBy('date_updated', 'DESC')->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','chapter_moinhat','theloai','theodoi'));
    }

    public function xemchapter($slug){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $truyen = Chapter::where('slug_chapter',$slug)->first();
        //breadcrumb
        $truyen_breadcrumb = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->first();
        //end breadcrumb
        $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id', 'ASC')->first();

        return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','next_chapter','previous_chapter','max_id','min_id','theloai','truyen_breadcrumb'));
    }

    public function timkiem_ajax(Request $request){
        $data = $request->all();
        if($data['keywords']){
            $truyen = Truyen::where('kichhoat',1)->where('ten_tr','LIKE','%'.$data['keywords'].'%')->get();
            $output='
            <ul class="dropdown-menu" style="display:block;">';
            foreach($truyen as $key => $tr){
                $output .='
                <li class="li_search_ajax"><a href="#">'.$tr->ten_tr.'</a></li>';
            }
            $output .='</ul>';
            echo $output;
        }
    }


    public function timkiem(Request $request){
        $data= $request->all();
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = Danhmuc::orderBy('id', 'DESC')->get();
        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen','theloai')->where('ten_tr','LIKE','%'.$tukhoa.'%')->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->get();
        return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','tukhoa'));

    }
}
