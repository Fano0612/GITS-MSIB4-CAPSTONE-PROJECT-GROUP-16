<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balancesheets;

class BalancesheetController extends Controller
{
    public function index()
    {
        $balancesheets = Balancesheets::all();
        return view('balance_sheet', compact('balancesheets'));
    }

    public function insertTransaction(Request $request)
    {
        $validatedData = $request->validate([
            'transaction_type' => 'required',
            'transaction_name' => 'required',
            'product_price' => 'required|numeric',
        ]);

        $user = auth()->user();
        $tID = time();

        Balancesheets::create([
            'transaction_id' => $tID,
            'user_id' => $user->id,
            'transaction_type' => $validatedData['transaction_type'],
            'transaction_name' => $validatedData['transaction_name'],
            'product_price' => $validatedData['product_price'],
        ]);

        return redirect()->route('balance_sheet')->with('success', 'Data successfully added.');
    }

    public function showTransaction($id)
    {
        $balancesheet = Balancesheets::where('transaction_id', $id)
            ->first();
        return view('balance_sheet_update', compact('balancesheet'));
    }
    

    public function editTransaction(Request $request, $id)
    {
        $balancesheet = Balancesheets::find($id);
        $validatedData = $request->validate([
            'transaction_id' => 'required',
            'user_id' => 'required|numeric',
            'transaction_type' => 'required',
            'transaction_name' => 'required',
            'product_price' => 'required|numeric',
        ]);

        if ($balancesheet) {
            $balancesheet->update([
                'transaction_id' => $validatedData['transaction_id'],
                'user_id' => $validatedData['user_id'],
                'transaction_type' => $validatedData['transaction_type'],
                'transaction_name' => $validatedData['transaction_name'],
                'product_price' => $validatedData['product_price'],
            ]);

            return redirect()->route('balance_sheet')->with('success', 'Data successfully updated.');
        } else {
            return redirect()->route('balance_sheet')->with('error', 'Data not found.');
        }
    }

    public function deleteTransaction($id)
    {
        $balancesheet = Balancesheets::find($id);
        if ($balancesheet) {
            $balancesheet->delete();
            return redirect()->route('balance_sheet')->with('success', 'Data successfully deleted.');
        } else {
            return redirect()->route('balance_sheet')->with('error', 'Data not found.');
        }
    }
}
