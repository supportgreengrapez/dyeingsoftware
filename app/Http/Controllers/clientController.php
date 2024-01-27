<?php
namespace App\Http\Controllers;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use App\User;
use App\Susers;
use App\biltyrecord;
use DB;
use Hash;
use App\trial_used;
use Mail;
use DateTime;
use App\cashtransaction;
use App\historycashtransaction;
class clientController extends Controller
{
    public function search_report(Request $request)
    {
        $id = 1;

        if (session()->get('type') == "client_owner")
        {

            $id = Auth::user()->id;

        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');

            $o_id = Susers::find($id);

            $id = $o_id->o_id;

        }

        //   $bilty_no_to = $request->input('bilty_no_to');
        $bilty_no_from = $request->input('bilty_no_from');

        $bilty_charges_to = $request->input('bilty_charges_to');

        //  $bilty_charges_from = $request->input('bilty_charges_from');
        //      $bundle_to = $request->input('bundle_to');
        $bundle_from = $request->input('bundle_from');

        //      $quantity_to = $request->input('quantity_to');
        $quantity_from = $request->input('quantity_from');

        $date_of_booking_to = $request->input('date_of_booking_to');

        $date_of_booking_from = $request->input('date_of_booking_from');

        $date_of_receiving_to = $request->input('date_of_receiving_to');

        $date_of_receiving_from = $request->input('date_of_receiving_from');

        $to_record = $request->input('to_record');

        $sender_name = $request->input('sender_name');

        $receiver_name = $request->input('receiver_name');

        $sender_city = $request->input('sender_city');
        $receiver_city = $request->input('receiver_city');

        $goods_company = $request->input('goods_company');

        $bilty_type = $request->input('bilty_type');

        $sql = "Select* from biltyrecords where ";

        $check = 0;

        if ($request->input('bilty_no_check'))
        {
            $sql .= "bilty_number = '$bilty_no_from' ";
            $check = 1;
        }
        if ($request->input('bilty_charges_check'))
        {
            if ($check == 1)
            {
                $sql .= "and bilty_charges = '$bilty_charges_to' ";
            }
            else
            {
                $sql .= "bilty_charges = '$bilty_charges_to' ";
                $check = 1;
            }
        }
        if ($request->input('sender_name_check'))
        {
            if ($check == 1)
            {
                $sql .= "and sender_company='$sender_name' ";
            }
            else
            {
                $sql .= "sender_company='$sender_name' ";
                $check = 1;
            }
        }
        if ($request->input('bundle_check'))
        {
            if ($check == 1)
            {
                $sql .= "and  bundles = '$bundle_from' ";
            }
            else
            {
                $sql .= " bundles = '$bundle_from' ";
                $check = 1;
            }
        }
        if ($request->input('quantity_check'))
        {
            if ($check == 1)
            {
                $sql .= "and  quantity = '$quantity_from' ";
            }
            else
            {
                $sql .= "quantity = '$quantity_from' ";
                $check = 1;
            }
        }
        if ($request->input('receiver_name_check'))
        {
            if ($check == 1)
            {
                $sql .= "and receiver_company='$receiver_name' ";
            }
            else
            {
                $sql .= "receiver_company='$receiver_name' ";
                $check = 1;
            }
        }

        if ($request->input('bilty_type_check'))
        {
            if ($check == 1)
            {
                $sql .= "and bilty_type='$bilty_type' ";
            }
            else
            {
                $sql .= "bilty_type='$bilty_type' ";
                $check = 1;
            }
        }

        if ($request->input('date_of_booking_check'))
        {
            if ($check == 1)
            {
                $sql .= "and (date_of_booking < '$date_of_booking_to' or date_of_booking = '$date_of_booking_to' ) and (date_of_booking ='$date_of_booking_from' or date_of_booking > '$date_of_booking_from' ) ";
            }
            else
            {
                $sql .= "(date_of_booking < '$date_of_booking_to' or date_of_booking = '$date_of_booking_to' ) and (date_of_booking > '$date_of_booking_from' or date_of_booking = '$date_of_booking_from' ) ";

                $check = 1;
            }
        }
        if ($request->input('date_of_receiving_check'))
        {
            if ($check == 1)
            {
                $sql .= "and date_of_receiving <= '$date_of_receiving_to' and date_of_receiving >= '$date_of_receiving_from' ";
            }
            else
            {
                $sql .= "date_of_receiving <= '$date_of_receiving_to' and date_of_receiving >= '$date_of_receiving_from' ";
                $check = 1;
            }
        }
        if ($request->input('sender_city_check'))
        {
            if ($check == 1)
            {
                $sql .= "and sender_city='$sender_city' ";
            }
            else
            {
                $sql .= "sender_city='$sender_city' ";
                $check = 1;
            }
        }
        if ($request->input('receiver_city_check'))
        {
            if ($check == 1)
            {
                $sql .= "and receiver_city='$receiver_city' ";
            }
            else
            {
                $sql .= "receiver_city='$receiver_city' ";
                $check = 1;
            }
        }
        if ($request->input('charges_to_check'))
        {
            if ($check == 1)
            {
                $sql .= "and charge_to='$charges_to' ";
            }
            else
            {
                $sql .= "charge_to='$charges_to' ";
                $check = 1;
            }
        }
        if ($request->input('to_record_check'))
        {
            if ($check == 1)
            {
                $sql .= "and to_record='$to_record' ";
            }
            else
            {
                $sql .= "to_record='$to_record' ";
                $check = 1;
            }
        }
        if ($request->input('goods_company_check'))
        {
            if ($check == 1)
            {
                $sql .= "and goods_company='$goods_company'";
            }
            else
            {
                $sql .= "goods_company='$goods_company'";
                $check = 1;
            }
        }
        if ($check == 1) $sql .= " and o_id = '$id'";
        else
        {
            $sql .= " o_id = '$id'";
        }
        return $this->reports('filter', $sql);
    }

    //   public function getreportByDate(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //   $end_date = $request->input('end_date');
    //   if(empty($start_date))
    //   {
    //       return redirect('/biltyrecords-report')->with('emessage','The Start Date can not be empty');
    //   }
    //   if(empty($end_date))
    //   {
    //   return  redirect('/biltyrecords-report')->with('emessage','The Start Date can not be empty');
    //   }
    //   $records = db::select("select* from biltyrecords  where (date_of_booking = '$start_date' or date_of_booking > '$start_date')  and (date_of_receiving = '$end_date' or date_of_receiving < '$end_date') ");
    

    //   return view('client.report',compact('records'));
    // }
    public function profile_edit(Request $request)
    {
        session()->put('name', $request->input('fname') . ' ' . $request->input('lname'));

        $u = user::find(Auth::user()->id);

        $u->fname = $request->input('fname');
        $u->lname = $request->input('lname');
        if ($request->input('password') == "null")
        {
            $u->save();
            return redirect()
                ->back()
                ->with('message', 'Your Profile has been updated Successfully');
        }
        else if ($request->input('password') != "null")
        {
            $u->password = bcrypt($request->input('password'));
            $u->save();
            return redirect()
                ->back()
                ->with('message', 'Your Profile and Password has been updated Successfully');
        }

    }
    public function profile_edit_view()
    {
        $user = Auth::user();

        return view('client.profile_edit', compact('user'));

    }
    public function password_change(Request $request, $username)
    {
        $password = bcrypt($request->input('password'));
        DB::update("update users set password ='$password' where username='$username'");
        return redirect('login')->with('message', 'Your Password has been changed Successfully');
    }
    public function verify_code($username, $code)
    {
        $result = DB::select("select* from reset_password where username= '$username' and verification_code= '$code' and TIMESTAMPDIFF(MINUTE,reset_password.created_at,NOW()) <=30 ");

        if (count($result) > 0)
        {
            return view('change_password', compact('username'));
        }
        else return "The Verification code is expired";
    }
    public function reset_password_view()
    {

        return view('password_reset');

    }

    public function reset_password(Request $request)
    {

        $username = $request->input('email');
        $result = DB::select("select* from users where username = '$username'");
        if (count($result) > 0)
        {
            $vcode = uniqid();
            DB::insert("insert into reset_password (username,verification_code) values('$username','$vcode') ");
            $customer_name = $result[0]->{'fname'} . ' ' . $result[0]->{'lname'};
            $data = array(
                'customer_name' => $customer_name,
                'customer_username' => $username,
                'customer_verification_code' => $vcode,

            );
            Mail::send('email.password_reset', $data, function ($message) use ($username)
            {

                $message->from('no-reply@biltybooks.com', 'BiltyBooks');

                $message->to($username)->subject('Password Reset');

            });
            return redirect()
                ->back()
                ->with('message', 'A Password reset link sent to your email');
        }
        else
        {
            return Redirect::back()
                ->withErrors('Username not found');
        }

    }

    public function checkIfLogin()
    {
        return redirect('/login');
    }
    public function home()
    {
        if (session()
            ->has('id') && Auth::check())
        {
            return redirect('/dashboard');
        }
        return view('index');
    }

    public function login_view()
    {
        
        if (session()
            ->has('id') && Auth::check())
        {
            return redirect('/dashboard');
        }
        return view('login');
    }
    public function register_view()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        if (count(user::where('username', $request->input('username'))
            ->get()) > 0)

        {
            return redirect('/register')
                ->with('error', 'Username is already Exists');
        }
        if ($request->input('password') != $request->input('cpassword'))
        {
            return redirect('/register')
                ->with('error', 'Your Password does not Match with Confirm Password');
        }
        $user = new User();
        $user->username = $request->input('username');
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->password = bcrypt($request->input('password'));
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->phone_number = $request->input('ph');
        $user->save();

        return redirect('/login')
            ->with('success', 'You are Successfully Registered');
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        if (count(user::where('username', $username)->get()) > 0)
        {

            $userdata = array(
                'username' => $username,
                'password' => $password
            );

            if (Auth::attempt($userdata))
            {

                session()->put('username', $username);
                session()->put('type', 'client_owner');
                session()
                    ->put('edit_permission', '1');
                session()
                    ->put('delete_permission', '1');

                $u = user::where('username', $username)->first();
                session()
                    ->put('subscription', $u->subscription);
                session()
                    ->put('id', $u->id);
                session()
                    ->put('name', $u->fname . ' ' . $u->lname);

                return redirect('/dashboard');
            }
            else return redirect('/login')
                ->with('error', 'Username or Password is incorrect');
        }
        else if (count(Susers::where([['username', '=', $username], ['status', '=', 1]])->get()) > 0)
        {
            $u = Susers::where('username', $username)->first();

            if (Hash::check($password, $u->password))
            {
                session()
                    ->put('username', $username);
                session()->put('type', 'client_user');
                session()
                    ->put('id', $u->id);
                session()
                    ->put('name', $u->fname . ' ' . $u->lname);
                session()
                    ->put('edit_permission', $u->edit_permission);
                session()
                    ->put('delete_permission', $u->delete_permission);
                $id = session()->get('id');
                $o_id = Susers::find($id);

                $id = $o_id->o_id;
                $sub = user::find($id);
                session()->put('subscription', $sub->subscription);
                return redirect('/dashboard');
            }
            else return redirect('/login')
                ->with('error', 'Username or Password is incorrect');
        }
        else
        {
            return redirect('/login')
                ->with('error', 'Username or Password is incorrect');
        }
    }
    public function logout()
    {
        session()
            ->flush();

        return redirect('/login');
    }

    public function manage_users_view()
    {

        $id = Auth::user()->id;
        $su = Susers::all()->where('o_id', $id);
        return view('client.manage_users', compact('su'));
    }
    public function create_users_view()
    {
        return view('client.create_user');
    }
    public function dashboard()
    {

        date_default_timezone_set("Asia/Karachi");
        $date = date('Y-m-d');

        if (session('type') == "client_owner")
        {
            $id = Auth::user()->id;
            $in = 'in';
            $out = 'out';
            $m_user = Susers::where('o_id', $id)->count();
            $r_c = biltyrecord::where('o_id', $id)->count();
            $result = DB::select("select * from biltyrecords where bilty_type = '$in' and o_id = '$id'");
            $result = count($result);
            $out = DB::select("select * from biltyrecords where bilty_type = '$out' and o_id = '$id'");
            $out = count($out);
            return view('client.dashboard', compact('m_user', 'r_c', 'result', 'out'));
        }
        else
        {

            $id = session()->get('id');
            $o_id = Susers::find($id);
            $in = 'in';
            $out = 'out';
            $id = $o_id->o_id;
            $o_id = $id;

            $r_c = biltyrecord::where('o_id', $o_id)->count();

            $result = DB::select("select * from biltyrecords where bilty_type = '$in' and o_id = '$id'");
            $result = count($result);
            $out = DB::select("select * from biltyrecords where bilty_type = '$out' and o_id = '$id'");
            $out = count($out);
            return view('client.dashboard', compact('r_c', 'result', 'out'));
        }
    }

    public function create_users(Request $request)
    {

        if (count(susers::where('username', $request->input('username'))
            ->get()) > 0)
        {

            return redirect('create-users')
                ->with('message', 'The User Already Exist in System');
        }
        if ($request->input('password') != $request->input('cpassword'))
        {

            return redirect('create-users')
                ->with('message', 'Your Password does not Match with Confirm Password');
        }
        $sub = session()->get('subscription');
        if ($sub == "BASIC")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 3 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');

            }
        }
        else if ($sub == "ESSENTIAL")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 6 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');
            }
        }
        else if ($sub == "PRO")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 11 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');
            }
        }
        else if ($sub == "TRIAL")
        {
            $count = count(susers::where('o_id', Auth::user()->id)
                ->get());
            if ($count - 2 == 0)
            {
                return redirect('manage-users')->with('message', 'you can not add more users, upgrade your subscription to add more.');
            }
        }
        $su = new Susers();
        $su->o_id = Auth::user()->id;

        if ($request->input('edit'))
        {
            $su->edit_permission = '1';
        }
        if ($request->input('delete'))
        {
            $su->delete_permission = '1';
        }
        $su->username = $request->input('username');

        $su->password = bcrypt($request->input('password'));
        $su->fname = $request->input('fname');
        $su->lname = $request->input('lname');
        $su->city = $request->input('city');
        $su->status = "1";
        $su->save();

        return redirect('manage-users')
            ->with('message', 'New User Has been updated');;

    }
    public function add_record_view()
    {
        return view('client.add_record');
    }
    public function add_record(Request $request)
    {

        $record = new biltyrecord();
        if (session()->get('type') == "client_owner")
        {
            $record->o_id = Auth::user()->id;
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');
            $o_id = Susers::find($id);

            $id = $o_id->o_id;
            $record->o_id = $id;

        }

        $record->bilty_number = $request->input('bilty_number');
        $record->bilty_type = $request->input('bilty_type');
        $record->sender_company = $request->input('sender_company');
        $record->receiver_company = $request->input('receiver_company');
        $record->sender_city = $request->input('sender_city');
        $record->receiver_city = $request->input('receiver_city');
        $record->date_of_booking = $request->input('date_of_booking');

        $record->date_of_receiving = $request->input('date_of_receiving');
        $record->goods_company = $request->input('goods_company');
        $record->quantity = $request->input('quantity');
        $record->bilty_charges = $request->input('bilty_charges');
        $record->bundles = $request->input('bundles');
        $record->notes = $request->input('notes');
        $record->description = $request->input('description');
        $record->charge_to = $request->input('charge_to');
        $record->to_record = $request->input('to_record');
        $record->entry_by = session()
            ->get('name');
        $record->save();
        return redirect('/records-view')
            ->with('message', 'Your New bilty record has been added');
    }
    public function records_view()
    {
        $id = 1;
        if (session()->get('type') == "client_owner")
        {

            $id = Auth::user()->id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');

            $o_id = Susers::find($id);

            $id = $o_id->o_id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }

        return view('client.records_list', compact('records'));
    }

    public function specific_view_record($id)
    {
        $r = biltyrecord::find($id);

        return view('client.records_view', compact('r'));
    }

    public function eidt_record_view($id)
    {
        $r = biltyrecord::find($id);

        return view('client.edit_record', compact('r'));
    }

    public function edit_record(Request $request, $id)
    {

        $record = biltyrecord::find($id);

        if (session()->get('type') == "client_owner")
        {
            $record->o_id = Auth::user()->id;
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');
            $o_id = Susers::find($id);

            $id = $o_id->o_id;
            $record->o_id = $id;

        }

        $record->bilty_number = $request->input('bilty_number');
        $record->bilty_type = $request->input('bilty_type');
        $record->sender_company = $request->input('sender_company');
        $record->receiver_company = $request->input('receiver_company');
        $record->sender_city = $request->input('sender_city');
        $record->receiver_city = $request->input('receiver_city');
        $record->date_of_booking = $request->input('date_of_booking');
        $record->date_of_receiving = $request->input('date_of_receiving');
        $record->goods_company = $request->input('goods_company');
        $record->quantity = $request->input('quantity');
        $record->bilty_charges = $request->input('bilty_charges');
        $record->bundles = $request->input('bundles');
        $record->notes = $request->input('notes');
        $record->description = $request->input('description');
        $record->charge_to = $request->input('charge_to');
        $record->to_record = $request->input('to_record');
        $record->entry_by = session()
            ->get('name');
        $record->save();
        return redirect('/records-view')
            ->with('message', 'Your Bilty Record has been updated');;
    }
    public function delete_record($id)
    {
        $r = biltyrecord::find($id);
        $r->delete();

        return redirect('/records-view')
            ->with('message', 'Your Bilty Record has been deleted');;
    }
    public function edit_user_view($id)
    {
        $u = susers::find($id);

        return view('client.edit_user', compact('u'));
    }

    public function edit_user(Request $request, $id)
    {
        $su = susers::find($id);
        if ($request->input('edit'))
        {
            $su->edit_permission = '1';
        }
        else
        {
            $su->edit_permission = '0';
        }
        if ($request->input('delete'))
        {
            $su->delete_permission = '1';
        }
        else
        {
            $su->delete_permission = '0';
        }
        if ($request->input('password') != $request->input('cpassword'))
        {
            return "password not same";
        }
        $su->username = $request->input('username');
        if ($request->input('password') == $request->input('cpassword') && $request->input('password') != "null")
        {
            $su->password = bcrypt($request->input('password'));
        }

        $su->fname = $request->input('fname');
        $su->lname = $request->input('lname');
        $su->city = $request->input('city');
        $su->save();

        return redirect('manage-users')
            ->with('message', 'user successfully updated');

        return view('client.edit_user', compact('u'));
    }
    public function delete_user($id)
    {
        $r = susers::find($id);
        $r->delete();

        return redirect('/manage-users')
            ->with('message', 'Your User has been deleted');;
    }

    public function reports($type = null, $sql = null)
    {

        $id = 1;

        if (session()->get('type') == "client_owner")
        {

            $id = Auth::user()->id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }
        else if (session()
            ->get('type') == "client_user")
        {
            $id = session()->get('id');

            $o_id = Susers::find($id);

            $id = $o_id->o_id;

            $records = DB::table('biltyrecords')->where('o_id', $id)->get();
        }

        $sender_name = db::select("select distinct sender_company from biltyrecords where o_id ='$id' and sender_company is not null");

        $receiver_name = db::select("select distinct receiver_company from biltyrecords where o_id ='$id' and receiver_company is not null");

        $sender_city = db::select("select distinct sender_city from biltyrecords where o_id ='$id' and sender_city is not null");

        $receiver_city = db::select("select distinct receiver_city from biltyrecords where o_id ='$id' and receiver_city is not null");
        $goods_company = db::select("select distinct goods_company from biltyrecords where o_id ='$id' and goods_company is not null");

        if ($type == 'filter')
        {
            $records = db::select($sql);
        }

        return view('client.report', compact('records', 'sender_name', 'receiver_name', 'sender_city', 'receiver_city', 'goods_company'));
    }

    public function view_subscription()
    {
        $username = session('username');
        $ccid = session('id');
        $days = '30';
        $months = '90';
        $monthss = '180';
        $year = '365';
        $customer = user::find($ccid);
        $check = cashtransaction::where('user_id', $ccid)->where('status', 'pending')
            ->first();
        if (!empty($check)) if ($check->status == "pending")
        {
            $check = 1;
        }
        else
        {
            $check = 0;
        }
        $mop = $customer->mode_of_payment;
        if ($customer->subscription != "NONE" && $customer->mode_of_payment != "cash" && $customer->subscription != "TRIAL" && $customer->subscription_status != 0)
        {
            $r = db::select("select* from bilty_transaction where username ='$username' ORDER BY id DESC LIMIT 1");
            if (count($r) > 0)
            {
                $a_id = $r[0]->{'agreement_id'};
            }
        }
        $t = trial_used::where('user_id', $ccid)->get();

        return view('client.price_plan', compact('a_id', 'check', 'mop', 't', 'customer', 'days', 'months', 'monthss', 'year'));
    }

    public function upload_cash_slip($subs, $month, Request $request)
    {
        $user_id = session('id');

        $result = DB::delete("delete from cashtransactions where user_id='$user_id '");

        $c = new cashtransaction();
        $b = new historycashtransaction();

        $c->subscription = $subs;
        $c->user_id = session('id');
        $days = $month * 30;

        if ($subs == "BASIC" && $days == '30')
        {

            $c->amount = 9;
            $c->days = $days;
        }

        if ($subs == "BASIC" && $days == '90')
        {

            $c->amount = 18;
            $c->days = $days;
        }

        if ($subs == "BASIC" && $days == '180')
        {

            $c->amount = 54;
            $c->days = $days;
        }

        if ($subs == "BASIC" && $days == '365')
        {

            $c->amount = 108;
            $c->days = $days;
        }
        else if ($subs == "ESSENTIAL" && $days == '30')
        {

            $c->amount = 13;
            $c->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '90')
        {

            $c->amount = 39;
            $c->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '180')
        {

            $c->amount = 78;
            $c->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '365')
        {

            $c->amount = 156;
            $c->days = $days;
        }

        else if ($subs == "PRO" && $days == '30')
        {

            $c->amount = 16;
            $c->days = $days;
        }

        else if ($subs == "PRO" && $days == '90')
        {

            $c->amount = 48;
            $c->days = $days;
        }
        else if ($subs == "PRO" && $days == '180')
        {

            $c->amount = 96;
            $c->days = $days;
        }
        else if ($subs == "PRO" && $days == '365')
        {

            $c->amount = 192;
            $c->days = $days;
        }

        $thumbnail = "";
        if ($request->hasFile('fileupload'))
        {
            $image = $request->file('fileupload');
            $uniqueFileName = uniqid() . $image->getClientOriginalName();

            $input['imagename'] = time() . '.' . strtolower($image->getClientOriginalExtension());

            $image->storeAs('public/images', $uniqueFileName);
            $thumbnail = $uniqueFileName;
        }
        $c->file = $thumbnail;

        $c->save();

        $pk = db::select("select id from cashtransactions where user_id ='$user_id' ORDER BY user_id DESC LIMIT 1");
        $a_id = $pk[0]->id;
        $b->cash_id = $a_id;
        $b->subscription = $subs;
        $b->user_id = session('id');
        $days = $month * 30;

        if ($subs == "BASIC" && $days == '30')
        {

            $b->amount = 9;
            $b->days = $days;
        }

        if ($subs == "BASIC" && $days == '90')
        {

            $b->amount = 18;
            $b->days = $days;
        }

        if ($subs == "BASIC" && $days == '180')
        {

            $b->amount = 54;
            $b->days = $days;
        }

        if ($subs == "BASIC" && $days == '365')
        {

            $b->amount = 108;
            $b->days = $days;
        }
        else if ($subs == "ESSENTIAL" && $days == '30')
        {

            $b->amount = 13;
            $b->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '90')
        {

            $b->amount = 39;
            $b->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '180')
        {

            $b->amount = 78;
            $b->days = $days;
        }

        else if ($subs == "ESSENTIAL" && $days == '365')
        {

            $b->amount = 156;
            $b->days = $days;
        }

        else if ($subs == "PRO" && $days == '30')
        {

            $b->amount = 16;
            $b->days = $days;
        }

        else if ($subs == "PRO" && $days == '90')
        {

            $b->amount = 48;
            $b->days = $days;
        }
        else if ($subs == "PRO" && $days == '180')
        {

            $b->amount = 96;
            $b->days = $days;
        }
        else if ($subs == "PRO" && $days == '365')
        {

            $b->amount = 192;
            $b->days = $days;
        }

        $thumbnail = "";
        if ($request->hasFile('fileupload'))
        {
            $image = $request->file('fileupload');
            $uniqueFileName = uniqid() . $image->getClientOriginalName();

            $input['imagename'] = time() . '.' . strtolower($image->getClientOriginalExtension());

            $image->storeAs('public/images', $uniqueFileName);
            $thumbnail = $uniqueFileName;
        }
        $b->file = $thumbnail;

        $b->save();

        return redirect('/view-subscription')
            ->with('message', 'Your Cash Payment has been submitted and under review, usually it take 2-3 business days to verify your payment');
    }

    public function transaction_history()
    {
        $id = session('id');
        $c = cashtransaction::where('user_id', $id)->get();
        return view('client.transaction_history', compact('c'));
    }

    public function start_trial()
    {
        $date = date('Y-m-d', strtotime(' + 7 days'));

        $id = session()->get('id');
        db::update("update users set subscription='TRIAL',s_created =CURRENT_TIMESTAMP(),subscription_status='1' where id ='$id'");
        session()->put('subscription', 'TRIAL');
        $t = new trial_used();
        $t->user_id = $id;
        $t->trial_end = $date;
        $t->save();
        return redirect('dashboard')
            ->with('message', 'Your Trial Has Been Started');
    }

    public function city()
    {
        //   return "a";
        //     $records = db::select("select* from biltyrecords");
        //     foreach($records as $city)
        //     {
        //         $a = "Lahore";
        //         $b = "Karachi";
        //         $sender_name = "Lahore office";
        //         $receiver_name = "Karachi Office";
        //   db::update("update biltyrecords set sender_city = '$a' , receiver_city = '$b' where sender_company = '$sender_name' and receiver_company = '$receiver_name'");
        

        // }
        //     $records1 = db::select("select* from biltyrecords  where sender_city = '$a' and receiver_city = '$b'");
        // $result1 =DB::update("update susers,users set susers.status='0 'where users.id = susers.o_id and users.subscription ='NONE' and users.subscription_status='0'");
        return $result1;

    }

    public function dyeing_list()
    {

        $id = session()->get('id'); 
        $result = db::select("select * from dyeing where user_id = '$id'");
        $result2 = db::select("select * from received_for_dyeing where user_id = '$id'");
        $material_center = db::select("select * from material_center where user_id = '$id '");
        
        $send_to = db::select("select * from sender where user_id = '$id '");
        $quality = db::select("select * from quality where user_id = '$id '");
        return view('client.dyeing_list', compact('result','result2','material_center','quality','send_to'));
    }

    public function dyeing_form_view()
    {
        
        $id = session()->get('id'); 
        
        $material_center = db::select("select * from material_center where user_id = '$id'");
        
        $send_to = db::select("select * from sender where user_id = '$id'");
        
        $quality = db::select("select * from quality where user_id = '$id'");
        
        return view('client.dyeing_form',compact('material_center', 'send_to' , 'quality'));
    }
    
    public function edit_dyeing_form_view($pk_id)
    {
        
        $id = session()->get('id'); 
        
        $material_center = db::select("select * from material_center where user_id = '$id'");
        
        $send_to = db::select("select * from sender where user_id = '$id'");
        
        $quality = db::select("select * from quality where user_id = '$id'");
        
        $result = DB::select("select* from dyeing where pk_id = '$pk_id'");
        return view('client.edit_dyeing_form',compact('result','material_center', 'send_to' , 'quality','pk_id'));
    }
    

    public function sender_form(Request $request)
    {
        $sender = $request->input('sender');
        $id = session()->get('id'); 
        
        $result = DB::select("select* from sender where sender = '$sender'");

            if (count($result) > 0)
            {
                return Redirect::back()->withErrors('Name already Exist');
            }
            else{
        DB::insert("insert into sender (sender,user_id)  values (?,?)", array(

            $sender,
            $id
        ));
            }
        
                return Redirect::back();
    }
    
    public function quality_form(Request $request)
    {
        $quality = $request->input('quality');
        $id = session()->get('id'); 
        $result = DB::select("select* from quality where quality = '$quality'");

            if (count($result) > 0)
            {
                return Redirect::back()->withErrors('Quality already Exist');
            }
            else{


        DB::insert("insert into quality (quality,user_id)  values (?,?)", array(

            $quality,
            $id
        ));
}
                return Redirect::back();
    }
    
    public function material_form(Request $request)
    {
        $material = $request->input('material');
        $id = session()->get('id'); 
        $result = DB::select("select* from material_center where material_center = '$material'");

            if (count($result) > 0)
            {
                return Redirect::back()->withErrors('Material Center Name already Exist');
            }
            else{

        DB::insert("insert into material_center (material_center,user_id)  values (?,?)", array(

            $material,
            $id
        ));
        }
        return Redirect::back();
    }


    public function dyeing_form(Request $request)
    {
        
        $user_id = session()->get('id'); 
        $tahn = $request->input('tahn');
        $date = $request->input('date');
        $weight = $request->input('weight');
        $quality = $request->input('quality');
        $quantity = $request->input('quantity');
        $party_lot_no = $request->input('party_lot_no');
        $send_to = $request->input('send_to');
        $color = $request->input('color');
        $bl = $request->input('bl');
        $challan_no = $request->input('challan_no');

        $dyeing_lot = $request->input('dyeing_lot');

        $folding = $request->input('folding');

        $cut_piece = $request->input('cut_piece');
        $unit = $request->input('unit');
        $material = $request->input('material');
        $remarks = $request->input('remarks');

        $status = "1";
        
        $result = DB::select("select* from material_center where material_center = '$material'");

            if (count($result) > 0)
            {
            }
            else{

        DB::insert("insert into material_center (material_center,user_id)  values (?,?)", array(

            $material,
            $user_id 
        ));
        }
        
        $result1 = DB::select("select* from quality where quality = '$quality'");

            if (count($result1) > 0)
            {
            }
            else{


        DB::insert("insert into quality (quality,user_id)  values (?,?)", array(

            $quality,
            $user_id
        ));
        }
        
        $result2 = DB::select("select* from sender where sender = '$send_to'");

            if (count($result2) > 0)
            {
            }
            else{
        DB::insert("insert into sender (sender,user_id)  values (?,?)", array(

            $send_to,
            $user_id
        ));
            }
            
        
        DB::insert("insert into dyeing (user_id,tahn,date,weight,quality,quantity,party_lot_no,send_to,color,bl,challan_no,folding,dyeing_lot,remarks,unit,material,status,remaining_quantity)  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
            $user_id,
            $tahn,
            $date,
            $weight,
            $quality,
            $quantity,
            $party_lot_no,
            $send_to,
            $color,
            $bl,
            $challan_no,
            $folding,
            $dyeing_lot,
            $remarks,
            $unit,
            $material,
            $status,
            $quantity
        ));
        
        if($dyeing_lot != "1"){
            $status ="2";
            DB::table('received_for_dyeing')
            ->where('pk_id', $dyeing_lot)
            ->update(['status' => $status ]);
            
        }

        return redirect('/view/dyeing/list');
    }
    
    
    public function edit_dyeing_form($pk_id,Request $request)
    {
        $status = "1";
        
        DB::table('dyeing')
            ->where('pk_id', $pk_id)->update(['tahn' => $request->input('tahn') , 'date' => $request->input('date') , 'weight' => $request->input('weight') , 'quality' => $request->input('quality'), 'quantity' => $request->input('quantity'),'send_to'=> $request->input('send_to'),'color'=> $request->input('color'),'bl'=> $request->input('bl'),'challan_no'=> $request->input('challan_no'),'folding'=> $request->input('folding'),'dyeing_lot'=> $request->input('dyeing_lot'),'unit'=> $request->input('unit'),'material'=> $request->input('material'),'status'=> $status]);

        return redirect('/view/dyeing/list');
    }
    public function delete_dyeing_form($pk_id)
    {
        DB::delete("delete from dyeing where pk_id = '$pk_id'");
        return redirect('/view/dyeing/list');
    }

    public function received_dyeing_form_view($id)
    {

        $result = db::select("select * from dyeing where pk_id='$id'");
        $user_id = session()->get('id'); 
        
        $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
        
        return view('client.received_dyeing', compact('result', 'id','material_center', 'send_to' , 'quality'));
    }
    
    public function edit_received_dyeing_form_view($id)
    {

        $result = db::select("select * from dyeing_received where pk_id='$id'");
        $user_id = session()->get('id'); 
        
        $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
        
        return view('client.edit_received_dyeing', compact('result', 'id','material_center', 'send_to' , 'quality'));
    }
    public function edit_received_dyeing_form_data($pk_id,Request $request)
    {
        $status = "1";
        
        $lot_no = $request->input('lot_no');
        DB::table('dyeing_received')
            ->where('pk_id', $pk_id)->update(['tahn' => $request->input('tahn') , 'date' => $request->input('date') , 'weight' => $request->input('weight') , 'quality' => $request->input('quality'), 'quantity' => $request->input('quantity'),'send_to'=> $request->input('send_to'),'color'=> $request->input('color'),'bl'=> $request->input('bl'),'challan_no'=> $request->input('challan_no'),'folding'=> $request->input('folding'),'dyeing_lot'=> $request->input('dyeing_lot'),'unit'=> $request->input('unit'),'material'=> $request->input('material'),'status'=> $status]);

        
        return redirect('/view/dyeing/detail/' . $lot_no);
    }
    
    public function delete_received_dyeing_form($pk_id)
    {
        DB::delete("delete from dyeing_received where pk_id = '$pk_id'");
        return redirect()->back();
    }

    public function received_dyeing_form(Request $request, $totalquantity)
    {
        
        $user_id = session()->get('id'); 
        $lot_no = $request->input('lot_no');
        $tahn = $request->input('tahn');
        $date = $request->input('date');
        $weight = $request->input('weight');
        $quality = $request->input('quality');
        $quantity = $request->input('quantity');
        $party_lot_no = $request->input('party_lot_no');
        $send_to = $request->input('send_to');
        $received_date = $request->input('received_date');
        $recieved_from = $request->input('recieved_from');
        $color = $request->input('color');
        $bl = $request->input('bl');
        $challan_no = $request->input('challan_no');

        $dyeing_lot = $request->input('dyeing_lot');

        $folding = $request->input('folding');

        $cut_piece = $request->input('cut_piece');

        $unit = $request->input('unit');
        $material = $request->input('material');
        $remarks = $request->input('remarks');
        $shortage = $request->input('shortage');

        $status = "1";

        $result = db::select("select * from dyeing_received where lot_no='$lot_no' ORDER BY pk_id DESC LIMIT 1");
        if (count($result) > 0)
        {

            $remaining_quantity = $result[0]->{'remaining_quantity'};
            if ($remaining_quantity == '0')
            {
                $r_quantity = $totalquantity - $quantity;
            }
            else
            {

                $r_quantity = $remaining_quantity - $quantity;
            }

        }
        else
        {
            $r_quantity = $totalquantity - $quantity;

        }
        
        $result = DB::select("select* from material_center where material_center = '$material'");

            if (count($result) > 0)
            {
            }
            else{

        DB::insert("insert into material_center (material_center,user_id)  values (?,?)", array(

            $material,
            $user_id 
        ));
        }
        
        $result1 = DB::select("select* from quality where quality = '$quality'");

            if (count($result1) > 0)
            {
            }
            else{


        DB::insert("insert into quality (quality,user_id)  values (?,?)", array(

            $quality,
            $user_id
        ));
        }
        
        $result2 = DB::select("select* from sender where sender = '$send_to'");

            if (count($result2) > 0)
            {
            }
            else{
        DB::insert("insert into sender (sender,user_id)  values (?,?)", array(

            $send_to,
            $user_id
        ));
            }

        DB::insert("insert into dyeing_received (lot_no,user_id,tahn,date,weight,quality,quantity,remaining_quantity,party_lot_no,send_to,received_date,recieved_from,color,bl,challan_no,folding,cut_piece,dyeing_lot,remarks,unit,material,shortage,status)  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
            $lot_no,
            $user_id,
            $tahn,
            $date,
            $weight,
            $quality,
            $quantity,
            $r_quantity,
            $party_lot_no,
            $send_to,
            $received_date,
            $recieved_from,
            $color,
            $bl,
            $challan_no,
            $folding,
            $cut_piece,
            $dyeing_lot,
            $remarks,
            $unit,
            $material,
            $shortage,
            $status
        ));
        
         DB::table('dyeing')
            ->where('pk_id', $lot_no)->update(['remaining_quantity' => $r_quantity ]);
        

        return redirect('/view/dyeing/detail/' . $lot_no);
    }
    
    public function receivedfor_dyeing_form_view()
    {

       $id = session()->get('id'); 
        
        $material_center = db::select("select * from material_center where user_id = '$id'");
        
        $send_to = db::select("select * from sender where user_id = '$id'");
        
        $quality = db::select("select * from quality where user_id = '$id'");
        
        return view('client.received_for_dyeing',compact('material_center', 'send_to' , 'quality'));
    }
    
    
    public function receivedfor_dyeing_form(Request $request)
    {
        
        $user_id = session()->get('id'); 
        $tahn = $request->input('tahn');
        $date = $request->input('date');
        $weight = $request->input('weight');
        $quality = $request->input('quality');
        $quantity = $request->input('quantity');
        $party_lot_no = $request->input('party_lot_no');
        $received_from = $request->input('received_from');
        $color = $request->input('color');
        $bl = $request->input('bl');
        $challan_no = $request->input('challan_no');

        $dyeing_lot = $request->input('dyeing_lot');

        $folding = $request->input('folding');

        $cut_piece = $request->input('cut_piece');
        $unit = $request->input('unit');
        $material = $request->input('material');
        $remarks = $request->input('remarks');

        $status = "1";
        
        $result = DB::select("select* from material_center where material_center = '$material'");

            if (count($result) > 0)
            {
            }
            else{

        DB::insert("insert into material_center (material_center,user_id)  values (?,?)", array(

            $material,
            $user_id 
        ));
        }
        
        $result1 = DB::select("select* from quality where quality = '$quality'");

            if (count($result1) > 0)
            {
            }
            else{


        DB::insert("insert into quality (quality,user_id)  values (?,?)", array(

            $quality,
            $user_id
        ));
        }
        
        $result2 = DB::select("select* from sender where sender = '$send_to'");

            if (count($result2) > 0)
            {
            }
            else{
        DB::insert("insert into sender (sender,user_id)  values (?,?)", array(

            $send_to,
            $user_id
        ));
            }

        DB::insert("insert into received_for_dyeing (user_id,tahn,date,weight,quality,quantity,party_lot_no,recieved_from,color,bl,challan_no,folding,dyeing_lot,remarks,unit,material,status)  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(
            $user_id,
            $tahn,
            $date,
            $weight,
            $quality,
            $quantity,
            $party_lot_no,
            $received_from,
            $color,
            $bl,
            $challan_no,
            $folding,
            $dyeing_lot,
            $remarks,
            $unit,
            $material,
            $status
        ));

        return redirect('/view/dyeing/list');
    }
    
    public function move_dyeing_form($id)
    {

        $result = db::select("select * from received_for_dyeing where pk_id='$id'");
        
        $user_id = session()->get('id'); 
        
        $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
        
        return view('client.move_to_dyeing', compact('result', 'id','material_center', 'send_to' , 'quality'));
    }

    public function folding_dyeing_form_view($id)
    {

        $result = db::select("select * from dyeing_received where pk_id='$id'");

        return view('client.folding_dyeing', compact('result', 'id'));
    }

    public function folding_dyeing_form(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $color = $request->input('color');
        $challan_no = $request->input('challan_no');

        $folding = $request->input('folding');

        $cut_piece = $request->input('cut_piece');

        $unit = $request->input('unit');
        $shortage = $request->input('shortage');

        $status = "2";

        DB::table('dyeing_received')->where('pk_id', $id)->update(['quantity' => $quantity, 'unit' => $unit, 'color' => $color, 'challan_no' => $challan_no, 'folding' => $folding, 'cut_piece' => $cut_piece, 'shortage' => $shortage, 'status' => $status]);

        return redirect('/view/dyeing/list');
    }

    public function dyeing_detail($id)
    {

        $result = db::select("select * from dyeing where pk_id='$id'");
        $result2 = db::select("select * from dyeing_received where lot_no='$id'");

        $cut_piece = DB::table('dyeing_received')->where('lot_no', $id)->sum('cut_piece');
        $shortage = DB::table('dyeing_received')->where('lot_no', $id)->sum('shortage');

        $remaining_quantity = db::select("select remaining_quantity from dyeing_received where lot_no='$id' ORDER BY pk_id DESC LIMIT 1");
        return view('client.received_dyeing_list', compact('result', 'result2', 'id', 'cut_piece', 'shortage', 'remaining_quantity'));
    }

    public function search_dyeing(Request $request)
    {

        $result1 = db::select("select * from dyeing");

        $s_date = $request->input('s_date');
        $e_date = $request->input('e_date');

        $s_name = $request->input('s_name');

        $r_name = $request->input('r_name');
        $lot_no = $request->input('lot_no');
        $material_center = $request->input('material_center');
        $quality = $request->input('quality');
        $state = $request->input('status');
        $color = $request->input('color');
        $user_id = session()->get('id'); 
        if (!empty($material_center) && !empty($s_name))
        {
            $result = DB::select("select * from dyeing where date BETWEEN '$s_date' AND '$e_date' and material = '$material_center' and send_to = '$s_name'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }
        
        if (!empty($state) && !empty($s_date) && !empty($e_date))
        {
            $result = DB::select("select * from dyeing where date BETWEEN '$s_date' AND '$e_date' and status = '$state'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }
        elseif (!empty($s_name))
        {

            $result = DB::select("select * from dyeing where send_to = '$s_name'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2' ,'quality','send_to','material_center'));
        }

        elseif (!empty($r_name))
        {

            $result = DB::select("select * from dyeing where  recieved_from = '$r_name'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }

        elseif (($s_date) && ($e_date) > 0)
        {
            $result = DB::select("select * from dyeing where date BETWEEN '$s_date' AND '$e_date' ");
            
            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }
        elseif (!empty($material_center))
        {

            $result = DB::select("select * from dyeing where  material = '$material_center'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2', 'quality','send_to','material_center'));
        }
        
        elseif (!empty($quality))
        {

            $result = DB::select("select * from dyeing where  quality = '$quality'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }
        elseif (!empty($state))
        {
            $result = DB::select("select * from dyeing where  status = '$state'");
            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }
        
        elseif (!empty($lot_no))
        {

            $result = DB::select("select * from dyeing where  pk_id = '$lot_no'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }
        elseif (!empty($color))
        {

            $result = DB::select("select * from dyeing where  color = '$color'");

            $result2 = db::select("select * from dyeing_received where lot_no='$user_id'");
            $material_center = db::select("select * from material_center where user_id = '$user_id'");
        
        $send_to = db::select("select * from sender where user_id = '$user_id'");
        
        $quality = db::select("select * from quality where user_id = '$user_id'");
            return view('client.dyeing_list', compact('result','result2','quality','send_to','material_center'));
        }

    }
    
    public function update_dyeing_status($id)
    {
        // $id = $request->input('id');
        // echo $id;
        // $status = $request->input('status');
        // DB::table('dyeing')
        //     ->where('pk_id', $request->input('id'))->update(['status' => $request->input('status') ]);
        // DB::table('dyeing_received')
        //     ->where('pk_id', $request->input('id'))->update(['status' => $request->input('status') ]);
        
        
        $status = "2";
        DB::update("update dyeing set status = '$status' where pk_id = '$id'");
        DB::update("update dyeing_received set status = '$status' where pk_id = '$id'");
          
        return redirect('/view/dyeing/list')->with('message', "Status has been change");
    }
}

