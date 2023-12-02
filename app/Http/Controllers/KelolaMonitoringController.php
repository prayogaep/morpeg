<?php

namespace App\Http\Controllers;

use App\Models\KelolaMonitoring;
use Illuminate\Http\Request;

class KelolaMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitoring = KelolaMonitoring::orderBy('tanggal', 'desc')->get();
        return view('kelola_monitoring.kelolamonitoring', compact('monitoring'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelola_monitoring.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'task_harian' => 'required',
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        KelolaMonitoring::create($validatedData);

        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitoring = KelolaMonitoring::findorfail($id);
        return view('kelola_monitoring.edit', compact('monitoring'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'task_harian' => 'required',
        ]);
        KelolaMonitoring::find($id)->update($validatedData);
        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Data Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KelolaMonitoring::destroy($id);
        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Data Berhasil Dihapus!');
    }

    public function validateTask(Request $request, $id)
    {
        $request->validate([
            'upload' => 'image|file'
        ]);

        $validatedData['upload'] = $request->file('upload')->store('task');
        $validatedData['tanggal_selesai'] = date('Y-m-d');
        $validatedData['status'] = 1;

        KelolaMonitoring::find($id)->update($validatedData);
        return redirect(route('kelolamonitoring.index'))->with('toast_success', 'Task berhasil diselesaikan!');
    }
}
