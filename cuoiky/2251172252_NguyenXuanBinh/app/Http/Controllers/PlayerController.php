<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::with('club')->orderBy('updated_at','desc')->paginate(10);
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Club::all();
        return view('players.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'position'=>'required|string|max:50',
            'number'=>'required|numeric|min:1|unique:players,number',
            'birthday'=>'required|date',
            'club_id'=>'required|exists:clubs,id',
        ],[
            'name.required'=>'Tên cầu thủ không được để trống.',
            'name.string'=>'Tên cầu thủ phải là chuỗi ký tự.',
            'position.required'=>'Vị trí là bắt buộc.',
            'position.string'=>'Vị trí của cầu thủ phải là chuỗi ký tự.',
            'position.max'=>'Vị trí của cầu thủ phải là chuỗi không quá 50 ký tự.',
            'number.required'=>'Số áo của cầu thủ là bắt buộc.',
            'number.numeric'=>'Số áo của cầu thủ phải là số.',
            'number.min'=>'Số áo của cầu thủ phải là số nguyên dương.',
            'number.unique'=>'Số áo hiện tại đã tồn tại, vui lòng chọn số áo khác.',
            'birthday.required'=>'Ngày tháng năm sinh là bắt buộc.',
            'birthday.date'=>'Ngày tháng năm sinh không hợp lệ.',
            'club_id.required'=>'Câu lạc bộ là bắt buộc.',
            'club_id.exists'=>'Câu lạc bộ không tồn tại.',
        ]);
        Player::create($request->all());
        return redirect()->route('players.index')->with('success', 'Thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = Player::findOrFail($id);
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clubs = Club::all();
        $player = Player::findOrFail($id);
        return view('players.edit', compact('clubs', 'player'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|string',
            'position'=>'required|string|max:50',
            'number'=>'required|numeric|min:1|unique:players,number',
            'birthday'=>'required|date',
            'club_id'=>'required|exists:clubs,id',
        ],[
            'name.required'=>'Tên cầu thủ không được để trống.',
            'name.string'=>'Tên cầu thủ phải là chuỗi ký tự.',
            'position.required'=>'Vị trí là bắt buộc.',
            'position.string'=>'Vị trí của cầu thủ phải là chuỗi ký tự.',
            'position.max'=>'Vị trí của cầu thủ phải là chuỗi không quá 50 ký tự.',
            'number.required'=>'Số áo của cầu thủ là bắt buộc.',
            'number.numeric'=>'Số áo của cầu thủ phải là số.',
            'number.min'=>'Số áo của cầu thủ phải là số nguyên dương.',
            'number.unique'=>'Số áo hiện tại đã tồn tại, vui lòng chọn số áo khác.',
            'birthday.required'=>'Ngày tháng năm sinh là bắt buộc.',
            'birthday.date'=>'Ngày tháng năm sinh không hợp lệ.',
            'club_id.required'=>'Câu lạc bộ là bắt buộc.',
            'club_id.exists'=>'Câu lạc bộ không tồn tại.',
        ]);
        $players = Player::findOrFail($id);
        $players->update($request->all());
        return redirect()->route('players.index')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $players = Player::findOrFail($id);
        $players->delete();
        return redirect()->route('players.index')->with('success', 'Xóa thành công.');
    }
}
