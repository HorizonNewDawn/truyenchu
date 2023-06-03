<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        return view('admin.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'tentheloai' => 'required|unique:theloai|max:255',
            'mota' => 'required|max:255',
            'slug_theloai' => 'required|max:255',
            'kichhoat' => 'required'
        ],[
            'tentheloai.required' => 'Tên thể loại không đươc để trống',
            'tentheloai.unique' => 'Tên thể loại đã có, vui lòng nhập tên khác',
            'mota.required' => 'Mô tả thể loại không được để trống',
            'mota.unique' => 'Mô tả đã có, vui lòng nhập mô tả khác',
            'slug_theloai.required' => 'Không được để trống Slug thể loại',
            'kichhoat.required' => 'Cần chọn trạng thái kích hoạt'
        ]);
        $theloai= new Theloai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];

        $theloai->save();
        return redirect()->back()->with('status', 'Thêm thể loại thành công');

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
    public function edit(string $id)
    {
        $theloai = Theloai::find($id);
        return view('admin.theloai.edit')->with(compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'tentheloai' => 'required|max:255',
            'mota' => 'required|max:255',
            'slug_theloai' => 'required|max:255',
            'kichhoat' => 'required'
        ],[
            'tentheloai.required' => 'Tên thể loại không đươc để trống',
            'tentheloai.unique' => 'Tên thể loại đã có, vui lòng nhập tên khác',
            'mota.required' => 'Mô tả thể loại không được để trống',
            'mota.unique' => 'Mô tả đã có, vui lòng nhập mô tả khác',
            'slug_theloai.required' => 'Không được để trống'
        ]);
        $theloai= Theloai::find($id);
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];

        $theloai->save();
        return redirect()->back()->with('status', 'Cập nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Theloai::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa thể loại thành công');
    }
}
