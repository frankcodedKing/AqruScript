<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Fund;
use App\Models\Withdrawal;
use App\Models\Investment;
use App\Models\Investmentplan;
use App\Models\Referral;
use App\Models\Topearner;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Sitesetting;
use App\Mail\Adminmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Transfer;


use Illuminate\Support\Facades\DB;

class Userdashcontroller extends Controller
{
    //
    public $owneremail = "codefi001@gmail.com";
    public function __construct()
    {
        $this->middleware('auth');
        $logged_in_user = Auth::user();
    }

    public function logged_in_user()
    {
        return  $logged_in_user = Auth::user();
    }



    // model-wheredataisstored
    // rowid-tabletostore
    // dataArray-datatobestored-colum,value
    public function savedata($mymodel, $rowid, $dataArray)
    {
        $model = $mymodel;
        if ($rowid == null) {
            # code...
            $rowselected = $model::where("id", 1)->first();
            if ($rowselected == null) {
                # code...
                $newrow = new $model;
                foreach ($dataArray as $key => $value) {
                    $newrow->$key = $value;
                }
                if ($newrow->save()) {
                    # code...
                    return true;
                } else {
                    return false;
                }
            } else {
                # code...
                foreach ($dataArray as $key => $value) {
                    $rowselected->$key = $value;
                }
                if ($rowselected->save()) {
                    # code...
                    return true;
                } else {
                    return false;
                }
            }
        } elseif (gettype($rowid) == "integer") {
            # code...
            $rowselected = $model::where("id", $rowid)->first();
            if ($rowselected == null) {
                # code...
                return false;
            } else {
                # code...
                foreach ($dataArray as $key => $value) {
                    $rowselected->$key = $value;
                }
                if ($rowselected->save()) {
                    # code...
                    return true;
                } else {
                    # code...
                    return false;
                }
            }
        } else {
            # code...
            $newentry =  new $model;
            foreach ($dataArray as $key => $value) {
                $newentry->$key = $value;
            }
            if ($newentry->save()) {
                # code...
                return true;
            } else {
                # code...
                return false;
            }
        }
    }

    //deletefn
    public function deleteRow($model, $rowid)
    {
        $row = $model::where("id", $rowid)->first();
        if ($row == null) {
            return "row to delete not found";
        } else {
            if ($row->delete) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function userdashb()
    {
        $user_running_investment = Investment::where('userid', $this->logged_in_user()->id)->where('investmentStatus', 0)->get();
        $current_profit = [];
        if ($user_running_investment->count() > 0) {
            foreach ($user_running_investment as $inv) {
                # code...
                $mature_date = $inv->investmentmaturitydate;
                $mature_date  = Carbon::parse($mature_date);
                $today = Carbon::now();
                $days_profit = $inv->stage;
                $days_profit_array = json_decode($days_profit);
                foreach ($days_profit_array as $day_profit) {
                    # code...
                    $dday = Carbon::parse($day_profit);
                    $today = Carbon::now();
                    if ($today->greaterThan($dday)) {
                        # code...
                        $inv->gotteninvestmentprofit = $inv->gotteninvestmentprofit  + $inv->investmentprofit;
                        unset($days_profit_array['day_profit']);
                        $days_string = json_encode($days_profit_array);
                    $inv->stage = $days_string ;
                    $inv->save();
                    $user_fundss = Fund::where('userid', $this->logged_in_user()->id)->first();
                   $user_fundss->currentprofit = $user_fundss->currentprofit + $inv->investmentprofit;
                   $user_fundss->save();

                    }
                   $investgottenprofit =  $inv->gotteninvestmentprofit;



                }
                if ($today->greaterThan($mature_date)) {
                    # code...
                    $user_funds = Fund::where('userid', $this->logged_in_user()->id)->first();
                    $user_funds->balance = $user_funds->balance +  $inv->investmentamount + $investgottenprofit;
                    $user_funds->currentinvestment = $user_funds->currentinvestment - $inv->investmentamount;
                    $user_funds->currentprofit = $user_funds->currentprofit - $investgottenprofit;

                    if ($user_funds->save()) {
                        # code...
                        $user_investment = Investment::where('id', $inv->id)->first();
                        $user_investment->investmentStatus = 1;
                        $user_investment->save();
                    } else {
                        # code...
                        $domain = request()->getHost();
                        $email = "codefi001@gmail.com";
                        $mail = "please there is an error in $domain investment calculation";
                        $mailtitle = "website error in $domain";
                        $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];

                        Mail::to($email)->send(new Adminmail($emaildata));
                    }
                }
                 else {
                    # code...
                }

                array_push( $current_profit, $inv->gotteninvestmentprofit);

            }
        } else {
        }
        $totalcurrentprofit = array_sum($current_profit);

        $user_fundsum = Fund::where('userid', $this->logged_in_user()->id)->first();
        $user_fundsum->totalbalance = $user_fundsum->balance + $user_fundsum->currentinvestment;
        $user_fundsum->totalprofit = $totalcurrentprofit;
        $user_fundsum->save();
        $user_funds = Fund::where('userid', $this->logged_in_user()->id)->first();
        $user_withdrawals = Withdrawal::where('userid', $this->logged_in_user()->id)->latest()->take(10)->get();
        $user_deposits = Deposit::where('userid', $this->logged_in_user()->id)->latest()->take(10)->get();
        $user_deposits_count = $user_deposits->count();
        $data = [];
        $data['title'] = "user dashboard";
        $data['funds'] = $user_funds;
        $data['withdrawals'] = $user_withdrawals;
        $data['user_deposits'] = $user_deposits;

        // dd($user_funds);

        $data['deposits'] = $user_deposits;
        return view('dashb.dashindex', $data);
    }

    public function userdash_pending_deposit()
    {
        $user_pending_deposit = Deposit::where('userid', $this->logged_in_user()->id)->where('status', '<', 1)->get();
        $data = [];
        $data['title'] = "pending deposit";
        $data['user_pending_deposit'] = $user_pending_deposit;
        return view('dashb.pendingdeposit', $data);
    }

    public function userdash_approved_deposit()
    {
        $data = [];
        $data['title'] = "approved deposit";
        $user_approved_deposit = Deposit::where('userid', $this->logged_in_user()->id)->where('status', '>', 0)->get();
        $data['user_approved_deposit'] = $user_approved_deposit;

        return view('dashb.approveddeposit', $data);
    }
    public function userdash_pedinging_withdrawal()
    {
        $data = [];
        $data['title'] = "Pending withdrawal";
        $user_pending_withdrawal = Withdrawal::where('userid', $this->logged_in_user()->id)->where('status', '<', 1)->get();
        $data['user_pending_withdrawal'] = $user_pending_withdrawal;

        return view('dashb.pendingwithdrawal', $data);
    }

    public function userdashb_approved_withdrawal()
    {
        $data = [];
        $data['title'] = "approved withdrawal";
        $user_approved_withdrawal = Withdrawal::where('userid', $this->logged_in_user()->id)->where('status', '>', 0)->get();
        $data['user_approved_withdrawal'] = $user_approved_withdrawal;

        return view('dashb.approvedwithdrawal', $data);
    }


    public function userdashb_investment_plans()
    {
        $plans = Investmentplan::all();
        $data = [];
        $data['title'] = "Investment Plans";
        $data['plans'] = $plans;

        return view('dashb.investment_plan', $data);
    }


    public function userdashb_plan(Request $req)
    {

        $plan = $req->plan;
        $duration = $req->duration;
        $amount = $req->amount;
        $plan_from_db = Investmentplan::where('plan', $plan)->first();
        $user_fund = Fund::where('userid', $this->logged_in_user()->id)->first();
        $duration =$plan_from_db->duration;
        
        // dd($plan_from_db);
        if ($amount > $plan_from_db->maximum) {
            # code...
            return redirect()->route('userdashb_investment_plans')->with('error', 'The amount you entered is above the selected plan maximum amount');
        } elseif ($amount < $plan_from_db->minimum) {
            # code...
            return redirect()->route('userdashb_investment_plans')->with('error', 'The amount you entered is below the selected plan minimum amount');
        } else {
            if ($amount > $user_fund->balance) {
                # code...
                return redirect()->route('userdashb_investment_plans')->with('error', 'Account balance low for the amount, please try a lower amount or fund your account');
            } else {
                # code...
                $raw_profit = $amount * $plan_from_db->percentage;
                $no_of_times =$plan_from_db->noofrepeat;
                $profit = $raw_profit / 100;
                $total_profit = $profit + $amount;
                $mature_date = Carbon::now()->addHours(24  *$no_of_times * (int)$duration);
                $each_mature_date = Carbon::now()->addHours(24  * (int)$duration);
                $days_array = array();
                for ($i=1; $i <= $no_of_times ; $i++) {
                    # code...
                    array_push($days_array, Carbon::now()->addHours(24  * $i*(int)$duration));
                }
                $days_string = json_encode($days_array);
                $new_bal = $user_fund->balance - $amount;
                $new_trading_balance = $user_fund->currentinvestment + $amount;
                $saveArray = [
                    'investmentplan' => $plan,
                    'investmentpercent' => $plan_from_db->percentage,
                    'investmentdate' => Carbon::now(),
                    'investmentduration' => $duration,
                    'investmentprofit' => $profit,
                    'investmenttotalprofit' => $total_profit,
                    'investmentmaturitydate' => $mature_date,
                    'investmentamount' => $amount,
                    'investmentStatus' => 0,
                    'stage' => $days_string ,
                    'nooftimes' => $no_of_times,
                    'userid' =>    $this->logged_in_user()->id,
                    'type' => $plan_from_db->type,
                    
                ];
                $result = $this->savedata(Investment::class, "new", $saveArray);
                if ($result) {
                    # code...
                    $user_fund->currentinvestment = $new_trading_balance;
                    $user_fund->balance = $new_bal;
                    $user_fund->save();
                    return redirect()->route('userdashb_investment_plans')->with("success", "Investment of $amount in the $plan plan is successful");
                } else {
                    # code...
                    return redirect()->route('userdashb_investment_plans')->with("error", "Investment failed please try again!");
                }
            }
        }
    }



    public function userdashb_current_investment()
    {
        $my_current_investments = Investment::where('userid', $this->logged_in_user()->id)->where('investmentStatus', 0)->get();
        $data = [];
        $data['title'] = "Current Investment";
        $data['my_current_investments'] = $my_current_investments;
        return view('dashb.my_current_investment', $data);
    }


    public function userdashb_expected_profit()
    {
        $expected_profit = Investment::where('userid', $this->logged_in_user()->id)->where('investmentStatus', 0)->get();
        $data = [];
        $data['title'] = "Expected Profit";
        $data['expected_profit'] = $expected_profit;

        return view('dashb.expected_profit', $data);
    }

    public function userdashb_investment_history()
    {
        $all_investment = Investment::where('userid', $this->logged_in_user()->id)->get();
        $data = [];
        $data['title'] = "Investment History";
        $data['all_investment'] = $all_investment;

        return view('dashb.investment_history', $data);
    }


    public function userdashb_referrals()
    {
        $data = [];
        $data['title'] = "referrals";
        $all_ref = DB::table('referrals')->where('olduseruserid', $this->logged_in_user()->id)->join('users', 'referrals.newuser', '=', 'users.id')->get();
        $data['all_ref'] = $all_ref;

        return view('dashb.all_referrals', $data);
    }


    public function userdashb_active_referrals()
    {

        $data = [];
        $data['title'] = "Active referrals";
        $all_active_ref = DB::table('referrals')->where('olduseruserid', $this->logged_in_user()->id)->join('users', 'referrals.newuser', '=', 'users.id')->join('funds', 'referrals.newuser', '=', 'funds.userid')->where('totalbalance', '>', 0)->get();
        $data['all_active_ref'] = $all_active_ref;
        return view('dashb.active_referrals', $data);
    }


    public function userdashb_inactive_referrals()
    {
        $data = [];
        $data['title'] = "Inactive referrals";
        $all_inactive_ref = DB::table('referrals')->where('olduseruserid', $this->logged_in_user()->id)->join('users', 'referrals.newuser', '=', 'users.id')->join('funds', 'referrals.newuser', '=', 'funds.userid')->where('totalbalance', '<', 0)->get();
        $data['all_inactive_ref'] = $all_inactive_ref;

        return view('dashb.inactive_referrals', $data);
    }



    public function userdashb_account_summary()
    {
        $data = [];
        $data['title'] = "Acount Overview";

        return view('dashb.account_summary', $data);
    }


    public function   userdashb_top_earners()
    {
        $data = [];
        $data['title'] = "Top Earners";
        $top_earners = Topearner::join('users', 'topearners.userid', '=', 'users.id')->paginate(20);
        $data['top_earners'] = $top_earners;
        return view('dashb.top_earners', $data);
    }


    public function   userdashb_deposit()
    {
        $data = [];
        $data['title'] = "Make deposit";

        return view('dashb.make_deposit', $data);
    }

    public function   userdashb_deposit_request(Request $req)
    {
        $data = [];
        $data['title'] = "Make deposit";
        $deposit_amount = $req->amount;
        $method = $req->method;
        $Sitesetting = Sitesetting::where('id', 1)->first();
        $methacc = $Sitesetting->$method;
        $saveArray = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'amount' => $deposit_amount,
            'method' => $method,
            'depositDate' => Carbon::now(),
            'methodAccount' => $methacc,
            'status' => 0,
            'userid' =>    $this->logged_in_user()->id,
        ];
        $result = $this->savedata(Deposit::class, "new", $saveArray);
        if ($result) {
            # code...
            $user_funds = Fund::where('id', $this->logged_in_user()->id)->first();
            $user_funds->pendingdeosit = $user_funds->pendingdeosit + $deposit_amount;
            $user_funds->save();
            $user = User::where("id", $this->logged_in_user()->id)->first();
            $email = $user->email;
            $mail = "please make a deposit of $deposit_amount to the $method  account $methacc";
            $mailtitle = "Deposit Request";
            $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];

            Mail::to($email)->send(new Adminmail($emaildata));

            $email = $this->owneremail;
            $username =$user->name;
            $mail = "The user $username has requested to make a deposit of $deposit_amount to the $method  account $methacc";
            $mailtitle = "Deposit Request from $username on "."".Carbon::now();
            $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];
            Mail::to($email)->send(new Adminmail($emaildata));
            $message = "please make a deposit of $deposit_amount to the $method account $methacc within the next 5hrs";
            return redirect()->route('userdashb_deposit')->with('success', $message);
        } else {
            # code...
            return redirect()->route('userdashb_deposit')->with('error', 'deposit request failed, please try again');
        }
        return view('dashb.make_deposit', $data);
    }


    public function   userdashb_withdrawal()
    {
        $data = [];
        $data['title'] = "Withdrawal";

        return view('dashb.make_withdrawal', $data);
    }

    public function userdashb_withdrawal_post(Request $req)
    {

        $amount = $req->amount;
        $address = $req->btcaddress;
        $user_fund = Fund::where('userid', $this->logged_in_user()->id)->first();
        if ($user_fund->withdrawal_limit < $amount) {
            # code...
            return redirect()->route('userdashb_withdrawal')->with('error', 'Withdrawal failed: reason - Withdrawal limit exceeded');
        } else {
            # code...
        }

        if ($user_fund->currentprofit < $amount) {
            # code...
            return redirect()->route('userdashb_withdrawal')->with('error', 'Withdrawal failed: reason - Insufficient Funds');
        } else {
            # code...
            $user_withdrawals_sum = Withdrawal::where('userid', $this->logged_in_user()->id)
                ->where('status', '<', 1)->sum('amount');
            $total_pending_withdrawal = $user_withdrawals_sum + $amount;
            if ($total_pending_withdrawal > $user_fund->currentprofit) {
                # code...
                return redirect()->route('userdashb_withdrawal')->with('error', 'you cannot withdraw such amount currently due to current pending withdrawals');
            } else {
                # code...

                $saveArray = [

                    'amount' => $amount,
                    'method' => 'BTC',
                    'methodaccount' => $address,
                    'withdrawaltdate' => Carbon::now(),
                    'status' => 0,
                    'name' => $this->logged_in_user()->name,
                    'userid' =>    $this->logged_in_user()->id,
                ];
                $result = $this->savedata(Withdrawal::class, "new", $saveArray);
                if ($result) {
                    # code...
                    $user_fund->pendingwithdrawal = $user_fund->pendingwithdrawal + $amount;
                    $user_fund->totalwithdrawal = $user_fund->totalwithdrawal + $amount;
                    $user_fund->save();

                    $domain = request()->getHost();
                    $email = $this->owneremail;
                    $username = $this->logged_in_user()->name;
                    $mail = "$username  have requested for withdrawal of the sum of $amount, on your website $domain ";
                    $mailtitle = "Withdrawal request  notification from $username on" ." ". Carbon::now();
                    $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];

                    Mail::to($email)->send(new Adminmail($emaildata));

                    return redirect()->route('userdashb_withdrawal')->with('success', 'withdrawal request submitted and under processing');
                } else {
                    # code...
                    return redirect()->route('userdashb_withdrawal')->with('error', 'withdrawal request failed');
                }
            }
        }
    }




    public function   userdashb_profile()
    {
        $data = [];
        $data['title'] = "Profile";

        return view('dashb.profile', $data);
    }

    public function   userdashb_wallet_address()
    {
        $data = [];
        $data['title'] = "Wallet Address";

        return view('dashb.my_wallet', $data);
    }

    public function   userdashb_message()
    {
        $data = [];
        $data['title'] = "Messages";
        $user_messages = Message::where('userid', $this->logged_in_user()->id)->where('read_status', 0)->get();
        $data['messages'] = $user_messages;

        return view('dashb.mymessages', $data);
    }


    public function   userdashb_message_detail(Request $req)
    {
        $data = [];
        $data['title'] = "Messages";
        $user_detail_messages = Message::where('userid', $this->logged_in_user()->id)->where('id', $req->message_id)->first();
        $data['detail_messages'] = $user_detail_messages;

        return view('dashb.message_detail', $data);
    }


    public function   userdashb_notification()
    {
        $user_notifications = Notification::where("userid", $this->logged_in_user()->id)->get();
        $data = [];
        $data['title'] = "Notification";
        $data['user_notifications'] = $user_notifications;

        return view('dashb.user_notification', $data);
    }


    public function   userdashb_notification_detail()
    {
        $user_notifications = Notification::where("userid", $this->logged_in_user()->id)->where('id', $req->id)->first();
        $data = [];
        $data['title'] = "Notification";
        $data['user_notifications'] = $user_notifications;

        return view('dashb.user_notification', $data);
    }



    public function userdashb_personal_detail(Request $req)
    {
        $name = $req->name;
        $email = $req->email;
        $phone = $req->phone;

        $saveArray = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
        ];
        $result = $this->savedata(User::class, $this->logged_in_user()->id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route('userdashb_profile')->with('success profile personal details updated succesfully');
        } else {
            # code...
            return redirect()->route('userdashb_profile')->with('error profile personal details update failed');
        }
    }
    public function userdashb_personal_address(Request $req)
    {

        $street = $req->street;
        $city = $req->city;
        $state = $req->state;
        $postal_code = $req->postal_code;

        $saveArray = [

            'street' => $street,
            'city' => $city,
            'state' => $state,
            'post_code' => $postal_code,
        ];
        $result = $this->savedata(User::class, $this->logged_in_user()->id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route('userdashb_profile')->with('success profile address details updated succesfully');
        } else {
            # code...
            return redirect()->route('userdashb_profile')->with('error profile address details update failed');
        }
    }

    public function userdashb_social_media(Request $req)
    {

        $facebook = $req->facebook;
        $instagram = $req->instagram;
        $twitter = $req->twitter;
        $linkedin = $req->linkedin;

        $saveArray = [

            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'linkedin' => $linkedin,
        ];
        $result = $this->savedata(User::class, $this->logged_in_user()->id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route('userdashb_profile')->with('success profile socail media details updated succesfully');
        } else {
            # code...
            return redirect()->route('userdashb_profile')->with('error profile social media details update failed');
        }
    }

    public function userdashb_password_reset()
    {
        $data = [];
        $data['title'] = "Password Reset";

        return view('dashb.password_reset', $data);
    }

    public function userdashb_password_reset_save(Request $req)
    {

        $password = $req->oldpassword;
        $newpassword = $req->newpassword;
        $cnewpassword = $req->cnewpassword;
        if (Hash::check($password, auth()->user()->password)) {

            if ($newpassword == $cnewpassword) {
                # code...

                auth()->user()->password = Hash::make($request->newpassword);
                $au = auth()->user()->save();
                if ($au) {
                    # code...
                    return redirect()->route('userdashb_password_reset')->with('success', 'password changed succesfuly');
                } else {
                    # code...
                    return redirect()->route('userdashb_password_reset')->with('error', 'password not changed succesfuly');
                }
            } else {
                # code...
                return redirect()->route('userdashb_password_reset')->with('error', 'new password and confirm password do not match');
            }
        } else {
            return redirect()->route('userdashb_password_reset')->with('danger', 'Wrong password please enter correct current password ');
        }
    }

    public function userdashb_profile_pic(Request $request)
    {

        $user = User::where("id", auth()->user()->id)->first();

        $fileowner = $user->email;

        $file_extension = $request->file('profilepic')->getClientOriginalExtension();
        if ($file_extension == "jpg") {
            # code...
            $save_file_extension = "jpg";
        } elseif ($file_extension == "jpeg") {
            # code...
            $save_file_extension = "jpeg";
        } else {
            $save_file_extension = "png";
        }
        $fileName = time() . $fileowner . '.' . $save_file_extension;
        $path = $request->file('profilepic')->storeAS("public/profile", $fileName);
        /* Store $fileName name in DATABASE from HERE */

        $user->profilepic = $fileName;


        if ($user->save()) {
            # code...
            return redirect()->route('userdashb_profile')->with('success', 'profile picture updated succesfuly');
        } else {
            # code...
            return redirect()->route('userdashb_profile')->with('error', 'profile picture update failed');
        }
    }
    public function userdashb_charts()
    {

        $data = [];
        $data['title'] = "Market Charts";

        return view('dashb.charts', $data);
    }

    public function userdashb_map()
    {
        $data = [];
        $data['title'] = "Map";
        return view('dashb.maps', $data);
    }


    // fund tranfer
    public function userdashb_tranfer()
    {

        $transfer = Transfer::where("userid", $this->logged_in_user()->id)->get();

        $data = [];
        $data["transfer"] = $transfer;
        $data['title'] = "Funds Tranfer";

        return view('dashb.transfer', $data);
    }

    public function userdashb_tranfer_post(Request $req)
    {

        $amount = $req -> amount;
        $benficiary_email = $req->email;

        $user_funds = Fund::where('userid', $this->logged_in_user()->id)->first();

        if ($user_funds->balance > $amount) {
            # code...
            if ($user_funds->transfer > 0) {
                # code...
                $user_beneficiary = User::where('email', $benficiary_email)->first();

                $beneficiary_funds = Fund::where('userid', $user_beneficiary->id)->first();

                $beneficiary_funds->balance = $beneficiary_funds->balance + $amount;
                if ($beneficiary_funds->save()) {
                    # code...
                    $user_funds->balance = $user_funds->balance - $amount;
                    if ($user_funds->save()) {
                        # code...
                        $last_transfer = new Transfer();
                        $last_transfer->userid = $this->logged_in_user()->id;
                        $last_transfer->amount =$amount;
                        $last_transfer->beneficiary =$benficiary_email;
                        if ($last_transfer->save()) {
                            # code...
                            return redirect()->route('userdashb_tranfer')->with("success", 'Tranfer completed ');
                        } else {
                            # code...
                            return redirect()->route('userdashb_tranfer')->with("warning", 'Error completing tranfer records');
                        }



                    } else {
                        # code...
                        return redirect()->route('userdashb_tranfer')->with("warning", 'Error debiting your account');
                    }

                } else {
                    # code...
                    return redirect()->route('userdashb_tranfer')->with("error", 'Error tranfering Funds');
                }
            } else {
                # code...
                return redirect()->route('userdashb_tranfer')->with("warning", 'access denied for the transaction');
            }
        } else {
            # code...
            return redirect()->route('userdashb_tranfer')->with("error", 'Insufficient funds to perfrom the transaction');
        }
    }

    public function stockplan (){

        $plans = Investmentplan::where('type','stockplans')->get();
        $data = [];
        $data['title'] = "Stock Investment Plans";
        $data['plans'] = $plans;

        return view('dashb.stockplan', $data);

    }

    public function forexplan (){

        $plans = Investmentplan::where('type','forexplans')->get();
        $data = [];
        $data['title'] = "Forex Investment Plans";
        $data['plans'] = $plans;

        return view('dashb.forexplan', $data);

    }

    public function realestateinvplan (){

        $plans = Investmentplan::where('type','realestateplan')->get();
        $data = [];
        $data['title'] = "Realestate Investment Plans";
        $data['plans'] = $plans;

        return view('dashb.realestateplan', $data);

    }

    public function cryptoplan (){

        $plans = Investmentplan::where('type','cryptoplans')->get();
        $data = [];
        $data['title'] = "Crypto Investment Plans";
        $data['plans'] = $plans;

        return view('dashb.cryptoplan', $data);

    }


}
