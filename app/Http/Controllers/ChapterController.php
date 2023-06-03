<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id', 'DESC')->get();
        // dd($chapter);
        return view('admin.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('admin.chapter.create')->with(compact('truyen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'tieude' => 'required|unique:chapter|max:255',
            'slug_chapter' => 'required|unique:chapter|max:255',
            'noidung' => 'required',
            // 'hinh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:2000,max_height:1200',
            'truyen_id' => 'required',
            'kichhoat' => 'required'
        ],[
            'tieude.required' => 'Tên chapter không được để trống',
            'tieude.unique' => 'Tên chapter đã tồn tại, vui lòng nhập tên khác',
            'slug_chapter.required' => 'Slug chapter không được để trống',
            'slug_chapter.unique' => 'Slug chapter đã tồn tại, vui lòng nhập slug khác',
            'noidung' => 'Nội dung chapter không được để trống',
            'truyen_id' => 'Truyện chưa được chọn',
            // 'hinh'=>'Hình ảnh không được để trống',
        ]);
        $chapter = new Chapter();
        $chapter ->tieude = $data['tieude'];
        $chapter ->noidung = $data['noidung'];
        $chapter ->slug_chapter = $data['slug_chapter'];
        $chapter ->truyen_id = $data['truyen_id'];
        $chapter ->kichhoat = $data['kichhoat'];


        // $get_image = $request->hinh;
        // $path = 'uploads/chapter';
        // $get_name_image = $get_image->getClientOriginalName();
        // $name_image = current(explode('.',$get_name_image));
        // $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        // $get_image->move($path,$new_image);

        // $chapter -> hinh = $new_image;

        $chapter->save();
        return redirect()->back()->with('status','Thêm chapter thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id', 'DESC')->get();
        return view('admin.chapter.edit')->with(compact('truyen','chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'tieude' => 'required|max:255',
            'slug_chapter' => 'required|max:255',
            'noidung' => 'required',
            // 'hinh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width:100,min_height:100,max_width:2000,max_height:1200',
            'truyen_id' => 'required',
            'kichhoat' => 'required'
        ],[
            'tieude.required' => 'Tên chapter không được để trống',
            'tieude.unique' => 'Tên chapter đã tồn tại, vui lòng nhập tên khác',
            'slug_chapter.required' => 'Slug chapter không được để trống',
            'slug_chapter.unique' => 'Slug chapter đã tồn tại, vui lòng nhập slug khác',
            'noidung' => 'Nội dung chapter không được để trống',
            'truyen_id' => 'Truyện chưa được chọn',
            // 'hinh'=>'Hình ảnh không được để trống',
        ]);
        $chapter = Chapter::find($id);
        $chapter ->tieude = $data['tieude'];
        $chapter ->noidung = $data['noidung'];
        $chapter ->slug_chapter = $data['slug_chapter'];
        $chapter ->truyen_id = $data['truyen_id'];
        $chapter ->kichhoat = $data['kichhoat'];

        $chapter->save();
        return redirect()->back()->with('status','Cập nhật chapter thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
       Chapter::find($id)->delete();
       return redirect()->back()->with('status','Xóa chapter thành công');
    }
}
