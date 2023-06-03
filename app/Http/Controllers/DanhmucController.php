<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmuc;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhmuc = Danhmuc::orderBy('id','DESC')->get();
        return view('admin.danhmuc.index')->with(compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'tendanhmuc' => 'required|unique:danhmuc|max:255',
            'mota' => 'required|max:255',
            'slug_danhmuc' => 'required|max:255',
            'kichhoat' => 'required'
        ],[
            'tendanhmuc.required' => 'Tên danh mục không đươc để trống',
            'tendanhmuc.unique' => 'Tên danh mục đã có, vui lòng nhập tên khác',
            'mota.required' => 'Mô tả danh mục không được để trống',
            'mota.unique' => 'Mô tả đã có, vui lòng nhập mô tả khác',
            'slug_danhmuc.required' => 'Không được để trống Slug danh mục',
            'kichhoat.required' => 'Cần chọn trạng thái kích hoạt'
        ]);
        $danhmuc= new Danhmuc();
        $danhmuc->tendanhmuc = $data['tendanhmuc'];
        $danhmuc->slug_danhmuc = $data['slug_danhmuc'];
        $danhmuc->mota = $data['mota'];
        $danhmuc->kichhoat = $data['kichhoat'];

        $danhmuc->save();
        return redirect()->back()->with('status', 'Thêm danh mục thành công');

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
        $danhmuc = Danhmuc::find($id);
        return view('admin.danhmuc.edit')->with(compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'tendanhmuc' => 'required|max:255',
            'mota' => 'required|max:255',
            'slug_danhmuc' => 'required|max:255',
            'kichhoat' => 'required'
        ],[
            'tendanhmuc.required' => 'Tên danh mục không đươc để trống',
            'tendanhmuc.unique' => 'Tên danh mục đã có, vui lòng nhập tên khác',
            'mota.required' => 'Mô tả danh mục không được để trống',
            'mota.unique' => 'Mô tả đã có, vui lòng nhập mô tả khác',
            'slug_danhmuc.required' => 'Không được để trống'
        ]);
        $danhmuc= Danhmuc::find($id);
        $danhmuc->tendanhmuc = $data['tendanhmuc'];
        $danhmuc->slug_danhmuc = $data['slug_danhmuc'];
        $danhmuc->mota = $data['mota'];
        $danhmuc->kichhoat = $data['kichhoat'];

        $danhmuc->save();
        return redirect()->back()->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Danhmuc::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }
}
