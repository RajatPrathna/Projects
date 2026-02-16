<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminPanel(){
        // if(!session()->has('adminName')){
        //     return redirect('admin/adminlogin');
        // }


        $totalProducts= Product::count();
        $currentYear = date('Y');

            $rows = Order::selectRaw("
                YEAR(order_date) as year,
                MONTH(order_date) as month_number,
                DATE_FORMAT(order_date, '%b') as month,
                SUM(totalAmount) as sales,
                COUNT(id) as orders,
                COUNT(DISTINCT user_id) as customers
            ")
            ->groupByRaw("YEAR(order_date), MONTH(order_date),  DATE_FORMAT(order_date, '%b')")
            ->orderByRaw("YEAR(order_date), MONTH(order_date)")
            ->get();

        $data = [];

            foreach ($rows as $row) {
            $data[$row->year][] = [
                'month' => $row->month,
                'sales' => (int) $row->sales,
                'orders' => (int) $row->orders,
                'customers' => (int) $row->customers, 
            ];
        }

        // dd($totalSales, $totalOrders, $totalProducts, $totalUsers);

        return view('admin/adminpanell', compact('totalProducts', 'currentYear', 'data'));
    }

    public function adminSignup(Request $request){
        $request->validate([
            'gmail'=>'required|email',
            'password'=>'required|min:5',
        ]);

        $user=User::create([
            'email'=>$request->gmail,
            'password'=>bcrypt($request->password),
        ]);
        
        $user->is_admin=true;
        $user->save();
        return view('admin/admindashboard');
    }


    public function adminLogin(){
        $request=request();
        $request->validate([
            'login_email'=>'required|email',
            'login_password'=>'required|min:1',
        ]);

        $admin=User::where('email', $request->login_email)->first();

        if (Auth::attempt([
            'email' => $request->login_email,
            'password' => $request->login_password,
            'is_admin' => 1,
        ])) {
            return redirect('admin/adminDashboard');
        }else{
            return back()->withErrors(['login_error' => 'Invalid email or password']);
        }
    }
}
