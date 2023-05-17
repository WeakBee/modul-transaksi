<?php

namespace App\Http\Controllers;

use \PDF;
use App\Mail\kirimEmail;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Exports\TransaksiExport;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransaksiController extends Controller
{
    public function successEmail() {
        if (Auth::check()) {
            return view('emails.email-success');
        } else {
            return redirect('/');
        }
    }
    public function kirimEmail(){
        $data = Transaksi::all();
        $emailuser = Auth::user()->email;
        $email = new kirimEmail($data);
        Mail::to($emailuser)->send($email);

        return redirect('/success-email');
    }
    public function exportexcel(){
        return Excel::download(new TransaksiExport, 'datatransaksi.xlsx');
    }

    public function exportpdf(){
        $data = Transaksi::all();
        
        view()-> share('data',$data);
        $pdf = PDF::loadview('datatransaksi-pdf');
        return $pdf->stream('data.pdf');
    }

    public function deleteTransaksi(Transaksi $data){
        $data->delete();
        return redirect('/');
    }
    public function actuallyEditTransaksi(Transaksi $data, Request $request){
        if (Auth::check()) {
            $incomingFields = $request->validate([
                'nama_pembeli' => 'required',
                'email_pembeli' => 'required',
                'nama_barang' => 'required',
                'harga_barang' => 'required',
                'jumlah_barang' => 'required'
            ]);
    
            $incomingFields['nama_pembeli'] = strip_tags($incomingFields['nama_pembeli']);
            $incomingFields['email_pembeli'] = strip_tags($incomingFields['email_pembeli']);
            $incomingFields['nama_barang'] = strip_tags($incomingFields['nama_barang']);
            $incomingFields['total_harga'] = $incomingFields['harga_barang'] * $incomingFields['jumlah_barang'];
            $data->update($incomingFields);
        }
        return redirect('/');
    }
    public function showEditTransaksi(Transaksi $data){
        if (Auth::check()) {
            return view('edit-transaksi', ['data' => $data]);
        }
        return redirect('/');
    }
    public function createTransaksi(Request $request){
        $incomingFields = $request->validate([
            'nama_pembeli' => 'required',
            'email_pembeli' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jumlah_barang' => 'required'
        ]);
        
        $incomingFields['id_transaksi'] = IdGenerator::generate(['table'=>'transaksi','field'=>'id_transaksi','length'=>10,'prefix'=>'TRC-']);
        $incomingFields['nama_pembeli'] = strip_tags($incomingFields['nama_pembeli']);
        $incomingFields['email_pembeli'] = strip_tags($incomingFields['email_pembeli']);
        $incomingFields['nama_barang'] = strip_tags($incomingFields['nama_barang']);
        $incomingFields['total_harga'] = $incomingFields['harga_barang'] * $incomingFields['jumlah_barang'];
        Transaksi::create($incomingFields);
        return redirect('/');
    }
}
