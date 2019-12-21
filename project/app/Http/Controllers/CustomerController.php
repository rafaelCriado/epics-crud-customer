<?php

namespace App\Http\Controllers;

use App\Address;
use App\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //List all custumers
    public function index()
    {
        try {
            $customers = [];
            $search = request('q');

            if ($search && $search !== '') {
                $customers = Customer::where('name', 'like', "%$search%")->get();
            } else {
                $customers = Customer::all();
            }

            return view('dashboard.customer.index', ['customers' => $customers, 'search' => $search]);
        } catch (\Exception $err) {
            return back()->withErrors('Oops! There was a problem, please try again!');
        }
    }

    //Page of insert new customer
    public function insert()
    {
        try {
            $states = State::all();
            return view('dashboard.customer.insert', ['states' => $states]);
        } catch (\Exception $th) {
            return back()->withErrors('Oops! There was a problem, please try again!');
        }
    }

    //Insert new customer
    public function create(StoreCustomerRequest $request)
    {
        //Start transaction
        DB::beginTransaction();

        try {
            $customer              = new Customer();
            $customer->status      = 'Ativo';
            $customer->name        = request('name');
            $customer->cpf         = request('cpf');
            $customer->email       = request('email');
            $customer->birthday    = request('birthday');
            $customer->phone       = request('phone');

            $saveCustomer = $customer->save();
            if ($saveCustomer) {

                $address              = new Address();
                $address->type        = 'residential';
                $address->state       = request('state');
                $address->street      = request('street');
                $address->district    = request('district');
                $address->city        = request('city');
                $address->zip_code    = request('zip_code');
                $address->customer_id = $customer->id;

                $saveAddress = $address->save();

                if ($saveAddress) {
                    DB::commit();
                    \Session::flash('message', ['msg' => 'Customer successfully registered', 'class' => 'success']);
                    return redirect()->route('customer.index');
                } else {
                    DB::rollback();
                    return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
                }
            } else {
                DB::rollback();
                return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
            }
        } catch (\Exception $th) {
            // dd($th);
            DB::rollback();
            return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
        }
    }

    //Page for show a customer
    public function show($id)
    {
        try {
            $customer = Customer::find($id);

            return view('dashboard.customer.show', ['customer' => $customer]);
        } catch (\Error $th) {
            dd($th);
            return back()->withErrors('Oops! There was a problem, please try again!');
        }
    }

    //Delete a customer
    public function delete($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            \Session::flash('message', ['msg' => 'Customer successfully deleted', 'class' => 'success']);

            return redirect()->route('customer.index');
        } catch (\Throwable $th) {
            return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
        }
    }

    //Page for edit customer
    public function update($id)
    {
        try {
            $customer = Customer::findOrFAil($id);
            $states = State::all();

            return view('dashboard.customer.edit', ['customer' => $customer, 'states' => $states]);
        } catch (\Exception $th) {
            return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
        }
    }

    //Save change values of the customer
    public function save(UpdateCustomerRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::findOrFail($id);
            $data = $request->only(['name', 'cpf', 'birthday', 'phone', 'email']);
            $addressData = $request->only(['street', 'district', 'zip_code', 'state', 'city']);

            $updateCustomer = $customer->update($data);
            if ($updateCustomer) {
                $address = $customer->addresses[0];

                $updateAddress = $address->update($addressData);

                if ($updateAddress) {
                    DB::commit();
                    \Session::flash('message', ['msg' => 'Customer successfully updateded', 'class' => 'success']);
                    return redirect()->route('customer.show', $customer->id);
                } else {
                    DB::rollback();
                    return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
                }
            } else {
                DB::rollback();
                return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
            }
        } catch (\Exception $th) {
            DB::rollback();
            return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
        }
    }


    //Change status customer
    public function changeStatus($id)
    {
        try {
            $status = 'Ativo';
            $customer = Customer::findOrFail($id);
            if ($customer->status === 'Ativo')
                $status = 'Inativo';

            $customer->status = $status;

            if ($customer->save()) {
                \Session::flash('message', ['msg' => 'Status customer successfully updateded', 'class' => 'success']);
                return back();
            } else {
                return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
            }
        } catch (\Throwable $th) {
            return back()->withErrors('Oops! There was a problem, please try again!')->withInput();
        }
    }
}
