<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;
use App\Models\Truyen;
use App\Models\Theloai;
use Carbon\Carbon;
use App\Models\Thuocloai;
use App\Models\Thuocmuc;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $list_truyen =  Truyen::with('danhmuctruyen','theloai')->orderBy('id','DESC')->get();
        return view('admin.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = Danhmuc::orderBy('id','DESC')->get();
        return view('admin.truyen.create')->with(compact('danhmuc','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'ten_tr' => 'required|unique:truyen|max:255',
            'slug_tr' => 'required|unique:truyen|max:255',
            'tomtat' => 'required',
            'tacgia' => 'required',
            'theloai' => 'required',
            'hinh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:2000,max_height:1200',
            // 'danhmuc_id' => 'required',
            'kichhoat' => 'required'
        ],[
            'ten_tr.required' => 'Tên truyện không được để trống',
            'ten_tr.unique' => 'Tên truyện đã tồn tại, vui lòng nhập tên khác',
            'slug_tr.required' => 'Slug truyện không được để trống',
            'slug_tr.unique' => 'Slug truyện đã tồn tại, vui lòng nhập slug khác',
            'tomtat' => 'Tóm tắt truyện không được để trống',
            'tacgia' => 'Tên tác giả truyện không được để trống',
            'theloai' => 'Chọn thể loại truyện',
            // 'danhmuc_id' => 'Danh mục chưa được chọn',
            'hinh'=>'Hình ảnh không được để trống',
            'danhmuc'=>'required',
            'theloai' => 'required',
        ]);
        $truyen = new Truyen();
        $truyen ->ten_tr = $data['ten_tr'];
        $truyen ->tomtat = $data['tomtat'];
        $truyen ->slug_tr = $data['slug_tr'];
        $truyen ->theloai = $data['theloai'];
        // $truyen ->danhmuc_id = $data['danhmuc_id'];
        $truyen ->kichhoat = $data['kichhoat'];
        $truyen ->tacgia = $data['tacgia'];
        $truyen -> created_at = Carbon::now('Asia/Ho_Chi_Minh');
        // $truyen -> updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        foreach ($data['danhmuc'] as $muc) {
            $truyen->danhmuc_id =$muc[0];
        }
        foreach ($data['theloai'] as $key => $the){
            $truyen->theloai_id = $the[0];
        }

        $get_image = $request->hinh;
        $path = 'uploads/truyen/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $truyen -> hinh = $new_image;
        $truyen->save();

        $truyen->thuocnhieudanhmuc()->attach($data['danhmuc']);
        $truyen->thuocnhieutheloai()->attach($data['theloai']);

        return redirect()->back()->with('status','Thêm truyện thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        $truyen =  Truyen::find($id);
        $danhmuc = Danhmuc::orderBy('id','DESC')->get();
        return view('admin.truyen.edit')->with(compact('truyen','danhmuc','theloai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'ten_tr' => 'required|max:255',
            'tomtat' => 'required',
            'tacgia' => 'required',
            // 'hinh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:2000,max_height:1200',
            'slug_tr' => 'required',
            // 'danhmuc_id' => 'required',
            'kichhoat' => 'required',
            'danhmuc'=>'required',
            'theloai' => 'required',
        ],[
            'ten_tr.required' => 'Tên truyện không được để trống',
            'ten_tr.required' => 'Tên truyện đã tồn tại, vui lòng nhập tên khác',
            'tomtat' => 'Tóm tắt truyện không được để trống',
            'slug_tr' => 'Slug truyện không được để trống',
            // 'danhmuc_id' => 'Danh mục chưa được chọn',
            'tacgia' => 'Tên tác giả truyện không được để trống',
            // 'hinh'=>'Hình ảnh không được để trống',
        ]);
        $truyen = Truyen::find($id);
        $truyen ->ten_tr = $data['ten_tr'];
        $truyen ->tomtat = $data['tomtat'];
        $truyen ->slug_tr = $data['slug_tr'];
        // $truyen ->danhmuc_id = $data['danhmuc_id'];
        $truyen ->kichhoat = $data['kichhoat'];
        $truyen ->tacgia = $data['tacgia'];
        // $truyen -> created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $truyen -> updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        foreach ($data['danhmuc'] as $muc) {
            $truyen->danhmuc_id =$muc[0];
        }
        foreach ($data['theloai'] as $key => $the){
            $truyen->theloai_id = $the[0];
        }

        $get_image =  $request->hinh;
        if($get_image){
            $path = 'uploads/truyen/'.$truyen->hinh;
            if(file_exists($path)){
                unlink($path);
             }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $truyen -> hinh = $new_image;
            }

        $truyen->thuocnhieudanhmuc()->attach($data['danhmuc']);
        $truyen->thuocnhieutheloai()->attach($data['theloai']);

        $truyen->save();
        return redirect()->back()->with('status','Cập nhật truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
     $truyen = Truyen::find($id)->delete();
     $path = 'uploads/truyen/'.$truyen->hinh;
     if(file_exists($path)){
        unlink($path);
     }
     Truyen::find($id)->delete();
     return redirect()->back()->with('status', 'Xóa truyện thành công');
    }
}
