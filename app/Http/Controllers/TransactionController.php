<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\TransactionExport;
use App\Product;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::orderBy('created_at','desc')->paginate(5);
        return view('transaction.index', compact('transaction'));
    }

    private function generateInvoice($date)
    {
        $tanggal = substr($date,8,2);
        $bulan = substr($date,5,2);
        $tahun = substr($date,2,2);
        $transaction = $this->transaction->whereDate('date',$date)->get();
        $no = 'TRX-'.$tanggal.$bulan.$tahun.'-'.sprintf('%05s',$transaction->count()+1);
        return $no;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->has('customer_id')){
                $customer_id = $request->customer_id;
            }else{
                $customer = Customer::create($request->all());
                $customer_id = $customer->id;
            }

            $data_transaction = [
                'invoice_no'=> $this->generateInvoice(date('Y-m-d')),
                'customer_id'=> $customer_id,
                'date'=> date('Y-m-d H:i:s'),
                'status'=> 'proses',
            ];

            $transaction = Transaction::create($data_transaction);

            for ($i=0; $i <count($request->product_id) ; $i++) {
                $price = Product::find($request->input('product_id.'.$i))->price;
                TransactionDetail::create([
                    'transaction_id'=> $transaction->id,
                    'product_id'=> $request->input('product_id.'.$i),
                    'qty'=> $request->input('qty.'.$i),
                    'price'=> $price,
                    'total' => $price * $request->input('qty.'.$i)
                ]);
            }

            $amount = TransactionDetail::where('transaction_id',$transaction->id)->get()->sum('total');
            Transaction::find($transaction->id)->update(['amount'=>$amount]);
            DB::commit();
            // return redirect()->route('transaction.index')->with('success-message','Data telah disimpan');
            return redirect()->route('transaction.print',$transaction->id);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error-message',$e->getMessage());
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {
        $transaction = new TransactionExport();
        return Excel::download($transaction, 'laporan_transaksi_'.now().'.xlsx');
    }
}
