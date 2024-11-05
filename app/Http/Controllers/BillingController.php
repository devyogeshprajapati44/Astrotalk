<?php

namespace App\Http\Controllers;
use App\Models\Billing; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\MobileNumber; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function billing()
    {
        return view('billing.billinguser');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function billingcreate(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
            'mobile' => ['required', new MobileNumber],
            'address' => ['required', 'string', 'max:255'],
            'billing_date' => ['required', 'date'],
            'gender' => ['required', 'in:Male,Female'],
            'message' => ['required', 'string', 'max:255'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            $billing = new Billing();
            $billing->name = $request->name;
            $billing->email = $request->email;
            $billing->user_name = $request->user_name;
            $billing->amount = $request->amount;
            $billing->mobile = $request->mobile;
            $billing->address = $request->address;
            $billing->billing_date = $request->billing_date;
            $billing->gender = $request->gender;
            $billing->message = $request->message;
            $billing->save();
    
            return redirect()->route('billing.billinguser')->with('success', 'Billing created successfully!');

        } catch (\Exception $e) {
            // Log error with full stack trace for debugging
            Log::error('Error inserting billing data: ', ['exception' => $e]);
            return redirect()->back()->with('error', 'Failed to create billing. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function billingshow(Request $request)
    {
        $billings = Billing::all(); // Fetch all users
        // return response()->json(['users' => $users], 200);
        return view('billing.billinguser', compact('billings'));
        dd($billings);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
