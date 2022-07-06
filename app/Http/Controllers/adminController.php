<?php

namespace App\Http\Controllers;

use App\Models\Companydetail;
use App\Models\Faq;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Investment;
use App\Models\Investmentplan;
use App\Models\Referral;
use App\Models\Topearner;
use App\Models\Fund;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Newspost;
use App\Models\Sitesetting;
use App\Mail\Adminmail;
use App\Models\Feature;
use App\Models\referralpercent;

use PhpParser\Node\Stmt\Foreach_;

class adminController extends Controller
{


  public  $website = "codefi001@gmail.com";

    public function __construct()
    {
        $this->middleware('isadmin');
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


    //
    public function adminindex()
    {
        return view("admin.adminindex");
    }

    public function pages()
    {
        $aboutCompany = Companydetail::where("id", 1)->first();
        $faqs = Faq::all();
        $data = ["companyDetail" => $aboutCompany, "faqs" => $faqs];
        return view("admin.pages", $data);
    }

    public function users()
    {
        $users = User::paginate(15);
        $data = ["users" => $users];
        return view("admin.users", $data);
    }



    public function emailmgt()
    {

        $users = User::all();
        $data = ["allsuer" => $users];
        return view("admin.emailmgt", $data);
    }

    public function sendemail(Request $request)
    {
        $id = $request->id;
        return view("admin.sendemail", ["id" => $id]);
    }

    public function sendbulkemail()
    {

        return view("admin.sendemail");
    }


    public function sendmail(Request $request)
    {
        $mailtitle = $request->mailtitle;
        $mail = $request->mail;
        $userid =  $request->userid;
        if (isset($userid)) {
            # code...
            $user = User::where("id", $userid)->first();
            $email = $user->email;
            $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];

            Mail::to($email)->send(new Adminmail($emaildata));

            return redirect()->route("emailmgt")->with("success", "Email sent to $email succesfuly");
        } else {
            # code...
            $users = User::all();
            foreach ($users as $user) {
                # code...
                $email = $user->email;
                $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];

                Mail::to($email)->send(new Adminmail($emaildata));
            }

            return redirect()->route("emailmgt")->with("success", "Email sent to all users succesfuly");
        }



        return view("admin.sendemail");
    }

    public function pendingdeposits()
    {
        $pendingDeposit = Deposit::where("status", 0)->paginate(20);
        $data = ["pendingDeposit" => $pendingDeposit];
        return view("admin.pendingdeposits", $data);
    }


    public function approve_deposit(Request $request)
    {
        $depo_id = $request->id;
        $depo_to_approve = Deposit::where('id', $depo_id)->first();
        $user_fund = Fund::where('userid', $depo_to_approve->userId)->first();
        $bal = $user_fund->balance;
        $totaldepost = $user_fund->totaldepost;
        $pendingdeosit = $user_fund->pendingdeosit;
        $user_fund->balance =  $bal  +  $depo_to_approve->amount;
        $user_fund->totaldepost = $totaldepost  +  $depo_to_approve->amount;
        $user_fund->pendingdeosit = $pendingdeosit - $depo_to_approve->amount;
        $fu = $user_fund->save();
        $depo_to_approve->status = 1;
        $dep = $depo_to_approve->save();
        if ($fu && $dep) {
            # code...
            $mail = "Your deposit request of $depo_to_approve->amount have been received in your account and your account credited ";
            $mailtitle = "Deposit Approval Notification";
            $email = User::where('id', $depo_to_approve->userId)->first()->email;
            $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];
            Mail::to($email)->send(new Adminmail($emaildata));
            return redirect()->route('users')->with('success', 'Deposit aaproved succesfuly');
        } else {
            # code...
            return redirect()->route('users')->with('error', 'Deposit aaproval failed');
        }
    }


    public function approveddeposits()
    {
        $approvedDeposit = Deposit::where("status", 1)->paginate(20);
        $data = ["approvedDeposit" => $approvedDeposit];
        return view("admin.approveddeposits", $data);
    }


    public function pendingwithdrawals()
    {
        $pednindWithdrawal = Withdrawal::where("status", 0)->join('users', 'users.id', '=', 'withdrawals.userid')->select('users.name', 'users.email', 'withdrawals.id as wid', 'withdrawals.amount', 'users.id')->get();
        $data = ["pendingwithdrawals" => $pednindWithdrawal];
        return view("admin.pendingwithdrawals", $data);
    }

    public function approvedwithdrawals()
    {
        $approveddWithdrawal = Withdrawal::where("status", 1)->join('users', 'users.id', '=', 'withdrawals.userid')->get();
        $data = ["approvedwithdrawals" => $approveddWithdrawal];
        return view("admin.approvedwithdrawals", $data);
    }

    public function markwithdrawalpaid (Request $request){
        $id =$request->id;

        $userwithdrawal = Withdrawal::where('id',$id)->first();

        $userwithdrawal->status = 1;
        $result = $userwithdrawal->save();
        if ($result) {
            # code...


$userdetail = User::where('id',$userwithdrawal->userid)->first();
            $email = $userdetail->email;
            $mail = "Good day $userdetail->name \r\n Your withdrawal of $$userwithdrawal->amount is successful,
             you can check your transaction status at https://www.blockchain.com/btc/address/$userwithdrawal->methodaccount. \r\n
             Log into your account to check your statistics: $this->website";
            $mailtitle = "Withdrawal successful";
            $emaildata=['data'=> $email,'email_body'=>$mail,'email_header'=>$mailtitle];
            Mail::to($email)->send(new Adminmail($emaildata));
//             $siteemail = "info@topfidelitytrade.com";
//             $headers= 'From: '.$siteemail.' '. "\r\n";
// $headers.= "MIME-Version: 1.0" . "\r\n";
//             mail($email, $mailtitle,$mail, $headers);



            return redirect()->route("pendingwithdrawals", $id)->with("success", "withdrawal paid succesfuly");
        } else {
            # code...
            return redirect()->route("pendingwithdrawals", $id)->with("error", "failed to mark withdrawal as paid");

    }
}


    public function runninginvestments()
    {

        $runninginvestments = Investment::where("investmentStatus", 0)->get();
        $data = ["runninginvestments" => $runninginvestments];
        return view("admin.runninginvestments",$data );
    }


    public function viewuser(Request $request)
    {
        $userid = $request->id;
        $userDetail = User::where("id", $userid)->first();
        $userWithdrawals = Withdrawal::where("userid", $userid)->get();
        $userInvestments = Investment::where("userid", $userid)->get();
        $userDeposits = Deposit::where("userid", $userid)->get();
        $userFunds = Fund::where("userid", $userid)->first();
        $data = ["userDetail" => $userDetail, "userFunds" => $userFunds, "userWithdrawals" => $userWithdrawals, "userDeposits" => $userDeposits, "userInvestments" => $userInvestments];

        return view("admin.viewuser", $data);
    }


    public function viewfaqs()
    {
        $allFaqs = Faq::all();
        $data = ["faqs" => $allFaqs];
        return view("admin.faqs", $data);
    }



    /**save faqs */
    public function savecompanyfaq(Request $request)
    {
        $question = $request->question;
        $answer = $request->answer;
        $saveArray = [
            "question" => $question,
            "answer" => $answer
        ];

        $result = $this->savedata(Faq::class, "new", $saveArray);
        if ($result) {
            # code...
            return redirect()->route("pages")->with("success", "Action was succesful! Faq created");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to create Faqs");
        }
    }



    public function editfaqs(Request $request)
    {
        $id =  $request->id;
        $id = (int)$id;
        $question =  $request->question;
        $answer =  $request->answer;

        $saveArray = [
            'question' => $question,
            'answer' => $answer,
        ];

        $result = $this->savedata(Faq::class, $id, $saveArray);

        if ($result) {
            # code...
            return redirect()->route("pages")->with("success", "Faq Update was succesful");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to update  Faq try again!");
        }
    }


    // delet faqs
    public function deletefaqs(Request $request)
    {
        $id = $request->id;
        $result = $this->deleteRow(Faq::class, $id);
        if ($result) {
            # code...
            return redirect()->route("pages")->with("warning", "Faq deleted successfuly");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to delete Faqs");
        }
    }



    public function savecompanydetails(Request $request)
    {

        $companyName =  $request->companyname;
        $runningDays =  $request->runningdays;
        $companyEmail =  $request->companyemail;
        $companyLocation =  $request->companylocation;
        $companyContact =  $request->companycontact;

        $saveArray = [
            'companyName' => $companyName,
            'runningDays' => $runningDays,
            'companyEmail' => $companyEmail,
            'companyLocation' => $companyLocation,
            'companyPhone' => $companyContact
        ];

        $result = $this->savedata(Companydetail::class, null, $saveArray);

        if ($result) {
            # code...
            return redirect()->route("pages")->with("success", "Update was succesful");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to update try again!");
        }
    }
    /** Save company about **/

    public function savecompanyabout(Request $request)
    {
        $aboutTitle = $request->about_title;
        $aboutText = $request->about_text;

        $saveArray = [
            'aboutTitle' => $aboutTitle,
            'aboutText' => $aboutText,

        ];


        $result = $this->savedata(Companydetail::class, null, $saveArray);
        if ($result) {
            # code...
            return redirect()->route("pages")->with("success", "Update was succesful! About company updated");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to update try About company again!");
        }
    }


    //user admin control
    public function adminuserdelete(Request $request)
    {
        $id = $request->id;
        $deuse = User::where("id", $id)->first();
        if ($deuse->delete()) {
            # code...
            return redirect()->route("users")->with("warning", "user deleted succesfuly");
        } else {
            # code...
            return redirect()->route("users")->with("error", "deleting user failed");
        }
    }
    public function adminunblock(Request $request)
    {
        $id = $request->id;
        $deuse = User::where("id", $id)->first();
        $deuse->blocked = 0;
        if ($deuse->save()) {
            # code...
            return redirect()->route("users")->with("success", "user unblocked successfuly");
        } else {
            # code...
            return redirect()->route("users")->with("error", "failed to unblock user");
        }
    }
    public function adminblock(Request $request)
    {
        $id = $request->id;
        $deuse = User::where("id", $id)->first();
        $deuse->blocked = 1;
        if ($deuse->save()) {
            # code...
            return redirect()->route("users")->with("success", "user blocked successfuly");
        } else {
            # code...
            return redirect()->route("users")->with("error", "failed to block user");
        }
    }

    public function updateuser(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $balance = $request->balance;
        $saveArray = ["name" => $name, "email" => $email, "phone" => $phone, "balance" => $balance];
        $result = $this->savedata(User::class, $id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "update was succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to update");
        }
    }
    public function depositupdate(Request $request)
    {
        $id = $request->id;
        $id = intval($id);
        $userid = $request->userid;
        $depositdate = $request->depositdate;
        $amount = $request->amount;
        $saveArray = ["amount" => $amount, "depositdate" => $depositdate];
        $result = $this->savedata(Deposit::class, $id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $userid)->with("success", "deposit update was succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $userid)->with("error", "failed to update deposit");
        }
    }

    public function deletedeposit(Request $request)
    {
        $id = $request->id;
        $id = intval($id);
        $userid = $request->userid;
        $result = Deposit::where('id', $id)->first();
        if ($result->delete()) {
            # code...
            return redirect()->route("viewuser", $userid)->with("success", "deposit deleted succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $userid)->with("error", "failed to delete deposit");
        }
    }

    public function adddeposit(Request $request)
    {
        $depositamount = $request->depositamount;
        $depositdate = $request->depositdate;
        $method = $request->method;
        $id = $request->id;

        $saveArray = ["email" => 'admin', "name" => 'admin', 'methodAccount' => "admin added", "amount" => $depositamount, "depositdate" => $depositdate, "method" => $method, "userId" => $id];
        $result = $this->savedata(Deposit::class, "new", $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "deposit added succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to add deposit");
        }
    }

    public function editwithdrawal(Request $request)
    {
        $id = $request->id;
        $id = (int)$id;
        $name = $request->name;
        $withdrawaldate = $request->withdrawaldate;
        $amount = $request->amount;
        $method = $request->method;
        $methodaccount = $request->methodaccount;

        $saveArray = [
            "withdrawaltdate" => $withdrawaldate,
            "amount" => $amount,
            "methodAccount" => $methodaccount,
            "method" => $method,
            "name" => $name
        ];
        $result = $this->savedata(Withdrawal::class, $id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "withdrawal edited succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to edit withdrawal");
        }
    }
    public function deletewithdrawal(Request $request)
    {
        $id = $request->id;
        $result = deleteRow(Withdrawal::class, $id);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "withdrawal deleted succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to delete withdrawal");
        }
    }
    public function addwithdrawal(Request $request)
    {
        $id = $request->id;
        $withdrawalamount = $request->withdrawalamount;
        $method = $request->method;
        $account = $request->account;
        $withdrawaldate = $request->withdrawaldate;
        $name = $request->name;
        $userId = $request->userid;

        $saveArray = [
            "withdrawaltdate" => $withdrawaldate,
            "amount" => $withdrawalamount,
            "methodaccount" => $account,
            "method" => $method,
            "name" => $name,
            "userid" => $userid,
        ];
        $result = $this->savedata(Withdrawal::class, "new", $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "withdrawal added succesful");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to add withdrawal");
        }
    }
    public function editinvestment(Request $request)
    {
        $id = $request->id;
        $id = (int)$id;
        $investmentdate = $request->investmentdate;
        $investmentpercent = $request->investmentpercent;
        $investmentmaturitydate = $request->investmentmaturitydate;
        $investmentamount = $request->investmentamount;
        $investmentprofit = $request->investmentprofit;
        $investmenttotalProfit = $request->investmenttotalProfit;
        $investmenttype = $request->type;

        $saveArray = [
            "investmentpercent" => $investmentpercent,
            "type" => $investmenttype,
            "investmentdate" => $investmentdate,
            "investmentmaturitydate" => $investmentmaturitydate,
            "investmentamount" => $investmentamount,
            "investmenttotalProfit" => $investmenttotalProfit,
            "investmentprofit" => $investmentprofit,

        ];
        $result = $this->savedata(Investment::class, $id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "Investment edited succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to edit investment");
        }
    }
    public function deleteinvestment(Request $request)
    {
        $id = $request->id;
        $result = deleteRow(Investment::class, $id);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "Investment deleted succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to delete investment");
        }
    }

    public function referrals()
    {
        $allrefs = [];
        $referrals =  Referral::distinct()->get(['olduseruserid']);
        foreach ($referrals as  $ref) {
            # code...
            $no0fRefferals = Referral::where("olduseruserid", $ref->olduseruserid)->get()->count();
            $refs = ["ref" => $ref, "refno" => $no0fRefferals];
            array_push($allrefs, $refs);
        }
        $all = ["refarray" => $allrefs];

        return view("admin.referrals", $all);
    }





    public function viewuserreferrals(Request $request)
    {
        $userid = $request->id;
        $userRefferals = Referral::where("olduseruserid", $userid)->get();
        $userarray = [];
        foreach ($userRefferals as $user) {
            # code...
            $aUserRefferals = Fund::where("userid", $user->userid)->get();
            $detailArray = ["refdeatil" => $aUserRefferals, "refid" => $user->id];
            array_push($userarray, $detailArray);
        }
        $data = ["userrefs" => $userarray];
        return view("admin.viewuserreferrals", $data);
    }


    public function payreferral(Request $request)
    {
        $id = $request->id;
        $saveArray = [
            "status" => 1,
        ];

        $result = $this->savedata(Referral::class, $id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route("referrals")->with("success", "Referram marked as paid");
        } else {
            # code...
            return redirect()->route("referrals")->with("error", "Failed to mark reffera as paid");
        }
    }

    public function delreferral(Request $request)
    {
        $id = $request->id;
        $result = deleteRow(Referral::class, $id);
        if ($result) {
            # code...
            return redirect()->route("viewuser", $id)->with("success", "Referral deleted succesfuly");
        } else {
            # code...
            return redirect()->route("viewuser", $id)->with("error", "failed to delete Referral");
        }
    }



    public function investmentplans()
    {
        $allplan = Investmentplan::all();
        $data = ["allplans" => $allplan];

        return view("admin.investmentplans", $data);
    }

    public function editinvestmentplan(Request $request)
    {
        $id = $request->id;
        $id  = (int)$id;
        $plan = $request->plan;
        $minimum = $request->minimum;
        $maximum = $request->maximum;
        $percentage = $request->percentage;
        $duration = $request->duration;
        $repeat = $request->repeat;
        $noofrepeat = $request->noofrepeat;

        $saveArray = [
            "plan" => $plan,
            "minimum" => $minimum,
            "maximum" => $maximum,
            "percentage" => $percentage,
            "duration" => $duration,
            "repeat" => $repeat,
            "noofrepeat" => $noofrepeat,

        ];
        $result = $this->savedata(Investmentplan::class, $id, $saveArray);
        if ($result) {
            # code...
            return redirect()->route("investmentplans", $id)->with("success", "Investment edited succesfuly");
        } else {
            # code...
            return redirect()->route("investmentplans", $id)->with("error", "failed to edit investment");
        }
    }

    public function createinvestmentplan(Request $request)
    {

        $plan = $request->plan;
        $minimum = $request->minimum;
        $maximum = $request->maximum;
        $percentage = $request->percentage;
        $duration = $request->duration;
        $repeat = $request->repeat;
        $noofrepeat = $request->noofrepeat;
        $type = $request->type;

        $saveArray = [
            "plan" => $plan,
            "type" => $type,
            "minimum" => $minimum,
            "maximum" => $maximum,
            "percentage" => $percentage,
            "duration" => $duration,
            "repeat" => $repeat,
            "noofrepeat" => $noofrepeat,

        ];
        $result = $this->savedata(Investmentplan::class, "new", $saveArray);
        if ($result) {
            # code...
            return redirect()->route("investmentplans")->with("success", "Investment $plan created succesfuly");
        } else {
            # code...
            return redirect()->route("investmentplans")->with("error", "failed to create $plan investment");
        }
    }

    public function deleteinvestmentplan(Request $request)
    {
        $id = $request->id;
        $result = Investmentplan::where('id', $id)->first()->delete();
        if ($result) {
            # code...
            return redirect()->route("investmentplans", $id)->with("success", "Investment plan deleted succesfuly");
        } else {
            # code...
            return redirect()->route("investmentplans", $id)->with("error", "failed to delete Investment plan");
        }
    }






    /**save news */

    public function news()
    {
        $news = Newspost::all();
        $data = ["newsposts" => $news];

        return view("admin.news", $data);
    }


    public function savenews(Request $request)
    {
        $newstitle = $request->newstitle;
        $newscontent = $request->newscontent;

        $saveNewsArray = [
            "newstitle" => $newstitle,
            "newscontent" => $newscontent
        ];
        $result = $this->savedata(Newspost::class, "new", $saveNewsArray);
        if ($result) {
            return redirect()->route("news")->with("success", "Newsposted-successfully");
        } else {
            # code...
            return redirect()->route("news")->with("success", "Newsposting Not succesful try again");
        }
    }

    public function editnews(Request $request)
    {
        $newstitle = $request->newstitle;
        $newscontent = $request->newscontent;
        $id = $request->id;
        $id = (int)$id;
        $saveNewsArray = [
            "newstitle" => $newstitle,
            "newscontent" => $newscontent
        ];
        $result = $this->savedata(Newspost::class, $id, $saveNewsArray);
        if ($result) {
            return redirect()->route("news")->with("success", "News edited-successfully");
        } else {
            # code...
            return redirect()->route("news")->with("success", "News editing Not succesful try again");
        }
    }


    public function deletenews(Request $request)
    {
        $id = $request->id;

        $result = $this->deleteRow(Newspost::class, $id);
        if ($result) {
            # code...
            return redirect()->route("news", $id)->with("success", "news deleted succesfuly");
        } else {
            # code...
            return redirect()->route("news", $id)->with("error", "failed to delete news");
        }
    }



    public function topearners()
    {

        $topEarners = Topearner::join('users', 'users.id', '=', 'Topearners.userid')->get();
        $data = ["topearners" => $topEarners];
        return view("admin.topearners", $data);
    }

    public function deltopearners(Request $request)
    {
        $userid = $request->id;
        $result = $this->deleteRow(Topearner::class, $userid);
        if ($result) {
            # code...
            return redirect()->route("pages")->with("warning", "top user deleted successfuly");
        } else {
            # code...
            return redirect()->route("pages")->with("error", "Failed to delete top user");
        }
    }


    public function addtopearners(Request $request)
    {
        $id = $request->id;
        $saveNewsArray = [
            "userid" => $id,
        ];
        $result = $this->savedata(Topearner::class, "new", $saveNewsArray);
        if ($result) {
            return redirect()->route("users")->with("success", "New top earner addedsuccessfully");
        } else {
            # code...
            return redirect()->route("users")->with("success", "adding Not succesful try again");
        }
    }

    public function payments_settings()
    {
        $payments = Sitesetting::where('id', 1)->first();
        $data = [];
        $data['payment'] = $payments;
        return view('admin.paymentsettings', $data);
    }

    public function post_payments_settings(Request $request)
    {
        $payments = Sitesetting::where('id', 1)->first();
        if (isset($payments)) {
            # code...
            $payments->btc_address = $request->btc_address;
            $payments->paypal = $request->paypal;
            $payments->eth = $request->eth;
            $payments->usdt = $request->usdt;
            $payments->xrp = $request->xrp;
            if ($payments->save()) {
                # code...
                return redirect()->route('payments_settings')->with('success', 'payments settings updated succesfuly');
            } else {
                # code...
                return redirect()->route('payments_settings')->with('error', 'payments settings update failed');
            }
        } else {
            # code...
            $payments = new Sitesetting();
            $payments->btc_address = $request->btc_address;
            $payments->paypal = $request->paypal;
            $payments->eth = $request->eth;
            $payments->usdt = $request->usdt;
            $payments->xrp = $request->xrp;
            if ($payments->save()) {
                # code...
                return redirect()->route('payments_settings')->with('success', 'payments settings updated succesfuly');
            } else {
                # code...
                return redirect()->route('payments_settings')->with('error', 'payments settings update failed');
            }
        }
    }



    function activate_fund_tranfer(Request $req)
    {
        $userid = $req->id;
        $user_transfer = Fund::where('userid', $userid)->first();
        $user_transfer->transfer = 1;
        if ($user_transfer->save()) {
            # code...
            return redirect()->route('viewuser', $userid)->with('success', 'Activation Succesful');
        } else {
            # code...
            return redirect()->route('viewuser', $userid)->with('error', 'Activation Failed');
        }
    }

    public function deactivate_fund_tranfer(Request $req)
    {
        $userid = $req->id;
        $user_transfer = Fund::where('userid', $userid)->first();
        $user_transfer->transfer = 0;
        if ($user_transfer->save()) {
            # code...
            return redirect()->route('viewuser', $userid)->with('success', 'Deactivation Succesful');
        } else {
            # code...
            return redirect()->route('viewuser', $userid)->with('error', 'Deactivation Failed');
        }
    }

    function add_bonus(Request $req)
    {
        $userid = $req->userid;
        $amount = $req->amount;
        $sendmailbonus = $req->mail;

        $user_funds = Fund::where('userid', $userid)->first();
        $user_funds->balance = $user_funds->balance + $amount;
        if ($user_funds->save()) {
            # code...
            if ($sendmailbonus > 0) {
                $user = User::where("id", $userid)->first();

                $email = $user->email;
                $mail = "This is to notify you that you recieved a bonus on your account";
                $mailtitle = "Bonus Notification";
                $emaildata = ['data' => $email, 'email_body' => $mail, 'email_header' => $mailtitle];

                Mail::to($email)->send(new Adminmail($emaildata));
            } else {
                # code...
                return redirect()->route('viewuser', $userid)->with('success', 'Bonus addedd succesfuly');
            }
        } else {
            # code...
            return redirect()->route('viewuser', $userid)->with('error', 'Error adding bonus');
        }
    }


    public function setwithdrawal_limit(Request $req)
    {
        $userid = $req->userid;
        $amount = $req->amount;

        $user_funds = Fund::where('userid', $userid)->first();
        $user_funds->withdrawal_limit =  $amount;
        if ($user_funds->save()) {
            # code...
            return redirect()->route('viewuser', $userid)->with('success', 'withdrawal Limit set succesfuly');
        } else {
            # code...
            return redirect()->route('viewuser', $userid)->with('error', 'Error setting withdrawal limit');
        }
    }






    //added new functionality

    public function refsetting()
    {
        $referral = referralpercent::where('id', 1)->first();
        $data = [];
        $data['referral'] = $referral;
        $feature =
            $data['feature'] = Feature::where('id', 1)->first();

        return view('admin.refsetting', $data);
    }

    public function post_referral_setting(Request $request)
    {
        $referral = referralpercent::where('id', 1)->first();
        if (isset($referral)) {
            # code...
            $referral->firstref = $request->firstref;
            $referral->secondref = $request->secondref;
            $referral->thirdref = $request->thirdref;
            if ($referral->save()) {
                # code...
                return redirect()->route('refsetting')->with('success', 'referral settings updated succesfuly');
            } else {
                # code...
                return redirect()->route('refsetting')->with('error', 'referral settings update failed');
            }
        } else {
            # code...
            $referral = new referralpercent();
            $referral->firstref = $request->firstref;
            $referral->secondref = $request->secondref;
            $referral->thirdref = $request->thirdref;
            if ($referral->save()) {
                # code...
                return redirect()->route('refsetting')->with('success', 'referral settings updated succesfuly');
            } else {
                # code...
                return redirect()->route('refsetting')->with('error', 'referral settings update failed');
            }
        }
    }


    function post_features_setting(Request $req)
    {
        $totalusers  = $req->totalusers;
        $totaldeposit =  $req->totaldeposit;
        $totalwithdrawn = $req->totalwithdrawn;
        $started = $req->started;
        $onlinevisitors = $req->onlinevisitors;
        $features = Feature::where('id', 1)->first();
        if ($features != null) {
            # code...
            $features->totalusers = $totalusers;
            $features->totaldeposit = $totaldeposit;
            $features->totalwithdrawn = $totalwithdrawn;
            $features->started = $started;
            $features->onlinevisitors = $onlinevisitors;
            if ($features->save()) {
                # code...
                return redirect()->route('refsetting')->with('success', 'saved succesfully');
            } else {
                # code...
                return redirect()->route('refsetting')->with('error', 'error updating');
            }
        } else {
            # code...
            $features = new Feature();
            $features->totalusers = $totalusers;
            $features->totaldeposit = $totaldeposit;
            $features->totalwithdrawn = $totalwithdrawn;
            $features->started = $started;
            $features->onlinevisitors = $onlinevisitors;
            if ($features->save()) {
                # code...
                return redirect()->route('refsetting')->with('success', 'saved succesfully');
            } else {
                # code...
                return redirect()->route('refsetting')->with('error', 'error updating');
            }
        }
    }







    public function setfeatures () {
        $company_features = Feature::where('id', 1)->first();
        $data=[];
        $data['feature'] = $company_features;
        return view('admin.setfeatures',$data);
    }


    function editbalance (Request $req){

        $balance = $req->balance;
        $currentinvestment = $req->currentinvestment;
        $totalbalance = $req->totalbalance;
        $currentprofit = $req->currentprofit;
        $earning = $req->earning;
        $userId = $req->userid;


        $user_funds = Fund::where('userid', $userId)->first();

        $user_funds->balance = $balance;
        $user_funds->currentinvestment = $currentinvestment;
        $user_funds->totalbalance = $totalbalance;
        $user_funds->currentprofit= $currentprofit;
        $user_funds->earning= $earning;


        if ($user_funds->save()) {
            # code...
            return redirect()->route('viewuser', $userId)->with('success', 'Account balance edited succesfuly');
        } else {
            # code...
            return redirect()->route('viewuser', $userId)->with('error', 'Error editing account balance');
        }


    }
}
