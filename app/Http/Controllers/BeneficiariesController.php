<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\beneficiaries;
use Illuminate\Http\Request;
use App\ploting;

class BeneficiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = ploting::all();
        $my_amounts = array();
        $my_schedules = array();
        foreach($schedules as $schedule){
            array_push($my_amounts,($schedule->Amount)/1000000000);
            array_push($my_schedules,$schedule->SCHEDULE);
        }
        return view('After.index',['my_schedules' => join(',', $my_schedules), 'my_amounts' => join(',', $my_amounts)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        beneficiaries::create(array(
            'NIN' => $request->national_id_number,
            'surname' => $request->surname,
            'other_names' => $request->other_names,
            'Age' => $request->age,
            'district' => $request->district,
            'sub_county' => $request->sub_county,
            'Amount' => $request->amount,
            'Schedule' => $request->schedule,
            'payment_status' => $request->payment_status,
            'SNo' => $request->serial_no,
        ));
        return redirect('/beneficiaries');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beneficiaries_add = beneficiaries::create(array(
            '' => $request->surname,
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function show(beneficiaries $beneficiaries)
    {
        $all_beneficiaries = beneficiaries::paginate('10');
        $count_paid_in_a_search = 0;
        $sum_paid_amount = 0;

        $count_pending_in_a_search = 0;
        $sum_pending_amount = 0;

        $count_total_in_a_search = 0;
        $sum_total_amount = 0;
        return view('After.view_beneficiary',compact('all_beneficiaries','sum_total_amount','sum_pending_amount','sum_paid_amount','count_paid_in_a_search','count_pending_in_a_search','count_total_in_a_search'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        #splitting the names to save them differently in the database
        $beneficiary_names = $request->beneficiary_name;
        $separeted_names = preg_split("/ /", $beneficiary_names);
        $surname = $separeted_names[0];
        $other_names = $separeted_names[1];

        #removing commas from the amount
        $amount_with_commas = $request->beneficiary_amount;
        $amount = str_replace(',','',$amount_with_commas);

        #save the edited data
        beneficiaries::where('id',$request->beneficiary_id)->update(['NIN' => $request->beneficiary_nin,'surname' => $surname,'other_names' => $other_names,
            'Age' => $request->beneficiary_age,'district' => $request->beneficiary_district,'sub_county' => $request->beneficiary_subcounty,
            'Amount' => $amount,'Schedule' => $request->benefiary_schedule,'payment_status' => $request->beneficiary_payment_status,
            'SNo' => $request->beneficiary_serial_no]);
            return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        beneficiaries::where('id',$request->beneficiary_id)->update(['payment_status' => 'Paid']);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\beneficiaries  $beneficiaries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        beneficiaries::where('id',$request->beneficiary_id)->update(['payment_status' => 'Pending']);
        return redirect()->back();
    }
    # Live Search is under development
    public function live_search(){
        return view('After.view_beneficiary');
    }
    public function search_by_checked_items(Request $request){
        $elements_written_to_search = $request->search_values;
        $after_removing_commas = preg_split('/,/',$elements_written_to_search);
        $my_array = array(0,0,0,0,0,0);
        foreach($after_removing_commas as $key=>$value){
                $my_array[$key]=$value;
        }
        $array_of_checked = [0,0,0,0,0];
        foreach($array_of_checked as $key=>$value){
            if($request->district != ""){
                $array_of_checked[0] =$my_array[0];
            }if($request->subcounty != ""){
                $array_of_checked[1] = $my_array[1];
            }if($request->schedule != ""){
                $array_of_checked[2] = $my_array[2];
            }if($request->Name != ""){
                $array_of_checked[3] = $my_array[3];
            }if($request->payment_status != ""){
                $array_of_checked[4] = $request->payment_status;
            }
        }
        //echo $my_array[0];
        $array_has_districts = ['district','sub_county','Schedule','payment_status'];
        foreach($array_of_checked as $key=>$value){
                for($i=0; $i<count($array_of_checked); $i++){
                    if($array_of_checked[$i] != ""){
                        //the loop searches through the arrays incrementing both array_of_checked and array_has_districts. then outputs
                        //wrong value
                        $all_beneficiaries = beneficiaries::where($array_has_districts[$i],$array_of_checked[$i])
                        ->get()->toJson();
                        return $all_beneficiaries;
                    }
                }
            }
        }
        public function search_by_any(Request $request){
        //Search by District
            if($request->search_by_district != "" && empty($request->searc_by_payment_only)&& empty($request->search_by_subcounty) && empty($request->search_by_schedule)){
                $sum_total_amount = beneficiaries::where('district',$request->search_by_district)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('district',$request->search_by_district)
                ->where('payment_status','Paid')->sum('Amount');
                $sum_pending_amount = beneficiaries::where('district',$request->search_by_district)
                ->where('payment_status','Pending')->sum('Amount');
                $count_paid_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('payment_status','Paid')->count();
                $count_total_in_a_search = beneficiaries::Where('district',$request->search_by_district)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('payment_status','Pending')->count();
                $all_beneficiaries=beneficiaries::where('district',$request->search_by_district)
                ->paginate('3000');
            }
            //Search by Subcounty Only
            elseif($request->search_by_subcounty != "" && empty($request->search_by_district) && empty($request->searc_by_payment_only) && empty($request->search_by_schedule)){
                $sum_total_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('payment_status','Paid')->sum('Amount');
                $sum_pending_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('payment_status','Pending')->sum('Amount');

                $count_paid_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('payment_status','Paid')->count();
                $count_total_in_a_search = beneficiaries::Where('sub_county',$request->search_by_subcounty)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('payment_status','Pending')->count();
                $all_beneficiaries=beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->paginate('3000');
            }
            //Search by Shedule Only
            elseif($request->search_by_schedule!="" && empty($request->search_by_district) && empty($request->search_by_subcounty) && empty($request->searc_by_payment_only)){
                $sum_total_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')->sum('Amount');
                $sum_pending_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')->sum('Amount');

                $count_paid_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')
                ->count();
                $count_total_in_a_search = beneficiaries::Where('Schedule',$request->search_by_schedule)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')
                ->count();
                $all_beneficiaries=beneficiaries::where('Schedule',$request->search_by_schedule)->paginate('3000');
            }
            //Search by Payment Only
            elseif($request->searc_by_payment_only !="" && empty($request->search_by_district) && empty($request->search_by_schedule) && empty($request->search_by_subcounty)){
                $sum_total_amount = beneficiaries::where('payment_status',$request->searc_by_payment_only)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('payment_status',$request->searc_by_payment_only)
                ->where('payment_status','Paid')
                ->sum('Amount');
                $sum_pending_amount = beneficiaries::where('payment_status',$request->searc_by_payment_only)
                ->where('payment_status','Pending')->sum('Amount');

                $count_paid_in_a_search = beneficiaries::where('payment_status',$request->searc_by_payment_only)
                ->where('payment_status','Paid')
                ->count();
                $count_total_in_a_search = beneficiaries::Where('payment_status',$request->searc_by_payment_only)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('payment_status',$request->searc_by_payment_only)
                ->where('payment_status','Pending')
                ->count();
                $all_beneficiaries=beneficiaries::where('payment_status',$request->searc_by_payment_only)
                ->paginate('3000');
            }
            //Search by District and Subcounty Only
            elseif($request->search_by_district != "" && $request->search_by_subcounty != "" && empty($request->search_by_schedule) && empty($request->searc_by_payment_only)){
                $sum_total_amount = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)->where('payment_status','Paid')
                ->sum('Amount');
                $sum_pending_amount = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)->where('payment_status','Pending')
                ->sum('Amount');

                $count_paid_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)->where('payment_status','Paid')
                ->count();
                $count_total_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('payment_status','Pending')
                ->count();
                $all_beneficiaries=beneficiaries::where('district',$request->search_by_district)->where('sub_county',$request->search_by_subcounty)->paginate('3000');
            }
            //Search by District and Schedule Only
            elseif($request->search_by_district != "" && $request->search_by_schedule!=""  && empty($request->search_by_subcounty) && empty($request->searc_by_payment_only)){
                $sum_total_amount = beneficiaries::where('district',$request->search_by_district)
                ->where('Schedule',$request->search_by_schedule)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('district',$request->search_by_district)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')
                ->sum('Amount');
                $sum_pending_amount = beneficiaries::where('district',$request->search_by_district)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')
                ->sum('Amount');

                $count_paid_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')
                ->count();
                $count_total_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('Schedule',$request->search_by_schedule)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')
                ->count();
                $all_beneficiaries=beneficiaries::where('district',$request->search_by_district)->where('Schedule',$request->search_by_schedule)->paginate('3000');
            }
            //Search by Subcounty and Schedule Only
            elseif($request->search_by_subcounty != "" && $request->search_by_schedule!=""  && empty($request->search_by_district) && empty($request->searc_by_payment_only)){
                $sum_total_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')
                ->sum('Amount');
                $sum_pending_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')
                ->sum('Amount');

                $count_paid_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')
                ->count();
                $count_total_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')
                ->count();
                $all_beneficiaries=beneficiaries::where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->paginate('3000');
            }
            //Search for district and payment_status
            elseif($request->search_by_district != "" && empty($request->search_by_subcounty) && empty($request->search_by_schedule) && $request->searc_by_payment_only !=""){
                if($request->searc_by_payment_only == "Paid"){
                    $sum_total_amount = beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Paid')
                    ->sum('Amount');
                    $sum_paid_amount =  beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Paid')
                    ->sum('Amount');
                    $sum_pending_amount = 0;

                    $count_paid_in_a_search = beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Paid')
                    ->count();
                    $count_total_in_a_search = beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Paid')
                    ->count();
                    $count_pending_in_a_search = 0;
                    $all_beneficiaries=beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Paid')
                    ->paginate('3000');
                }
                else{
                    $sum_total_amount = beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Pending')
                    ->sum('Amount');
                    $sum_paid_amount =  0;
                    $sum_pending_amount = beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Pending')
                    ->sum('Amount');

                    $count_paid_in_a_search = 0;
                    $count_total_in_a_search = beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Pending')
                    ->count();
                    $count_pending_in_a_search = beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Pending')
                    ->count();
                    $all_beneficiaries=beneficiaries::where('district',$request->search_by_district)
                    ->where('payment_status','Pending')
                    ->paginate('3000');
                }
            }
            //Search for Subcounty and Payment Status
            elseif(empty($request->search_by_district) && $request->search_by_subcounty != "" && empty($request->search_by_schedule) && $request->searc_by_payment_only !=""){
                if($request->searc_by_payment_only == "Paid"){
                    $count_paid_in_a_search=beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')->count();
                    $count_pending_in_a_search=0;
                    $count_total_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')->count();
                    $all_beneficiaries = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')->paginate('3000');
                    $sum_total_amount=beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')->sum('Amount');
                    $sum_paid_amount=beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')->sum('Amount');
                    $sum_pending_amount = 0;
                }
                elseif($request->searc_by_payment_only == "Pending"){
                    $count_pending_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')->count();
                    $count_total_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')->count();
                    $all_beneficiaries = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')->paginate('3000');
                    $sum_total_amount=beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')->sum('Amount');
                    $sum_paid_amount=0;
                    $sum_pending_amount=beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')->sum('Amount');
                }
            }
            //Search for Schedule and Payment Status
            elseif(empty($request->search_by_district) && empty($request->search_by_subcounty) && $request->search_by_schedule != "" && $request->searc_by_payment_only !=""){
                if($request->searc_by_payment_only == "Paid"){
                    $sum_total_amount=beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')->sum('Amount');
                    $sum_paid_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')->sum('Amount');
                    $sum_pending_amount = 0;
                    $count_paid_in_a_search=beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')->count();
                    $count_pending_in_a_search=0;
                    $count_total_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')->count();
                    $all_beneficiaries=beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')->paginate('3000');
                }
                elseif($request->searc_by_payment_only == "Pending"){
                    $sum_total_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')->sum('Amount');
                    $sum_pending_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')->sum('Amount');
                    $sum_paid_amount = 0;
                    $count_pending_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')->count();
                    $count_paid_in_a_search = 0;
                    $count_total_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')->count();
                    $all_beneficiaries = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')->paginate('3000');
                }
            }
            // Search for District, Subcounty, Schedule
            elseif($request->search_by_district != "" && $request->search_by_subcounty != "" && $request->search_by_schedule != "" && empty($request->searc_by_payment_only)){
                $sum_total_amount = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->sum('Amount');
                $sum_paid_amount =  beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')
                ->sum('Amount');
                $sum_pending_amount = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')
                ->sum('Amount');

                $count_paid_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Paid')->count();
                $count_total_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->count();
                $count_pending_in_a_search = beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->where('payment_status','Pending')
                ->count();
                $all_beneficiaries=beneficiaries::where('district',$request->search_by_district)
                ->where('sub_county',$request->search_by_subcounty)
                ->where('Schedule',$request->search_by_schedule)
                ->paginate('3000');
            }
            //Search for Subcounty, Schedule, Payment Status
            elseif($request->search_by_subcounty != "" && $request->search_by_schedule!=""  && empty($request->search_by_district) && $request->searc_by_payment_only !=""){
                if($request->searc_by_payment_only == "Paid"){
                    $sum_total_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->where('Schedule',$request->search_by_schedule)
                    ->sum('Amount');
                    $sum_paid_amount =  beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)->where('payment_status','Paid')
                    ->sum('Amount');
                    $sum_pending_amount = 0;

                    $count_paid_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->where('Schedule',$request->search_by_schedule)
                    ->count();
                    $count_total_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->where('Schedule',$request->search_by_schedule)
                    ->count();
                    $count_pending_in_a_search = 0;
                    $all_beneficiaries=beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->paginate('3000');
                    }
                    elseif($request->searc_by_payment_only == "Pending"){
                    $sum_total_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')
                    ->where('Schedule',$request->search_by_schedule)
                    ->sum('Amount');
                    $sum_paid_amount =  0;
                    $sum_pending_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->sum('Amount');

                    $count_paid_in_a_search = 0;
                    $count_total_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')->where('Schedule',$request->search_by_schedule)
                    ->count();
                    $count_pending_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')->where('Schedule',$request->search_by_schedule)
                    ->count();
                    $all_beneficiaries=beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')
                    ->paginate('3000');
                }
            }
            //Search for District, Subcounty, Payment Status
            elseif($request->search_by_subcounty != "" && empty($request->search_by_schedule)  && $request->search_by_district != "" && $request->searc_by_payment_only !=""){
                if($request->searc_by_payment_only =="Paid"){
                    $sum_total_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)
                    ->sum('Amount');
                    $sum_paid_amount =  beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)
                    ->where('payment_status','Paid')
                    ->sum('Amount');
                    $sum_pending_amount = 0;

                    $count_paid_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)
                    ->count();
                    $count_total_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)
                    ->count();
                    $count_pending_in_a_search = 0;
                    $all_beneficiaries=beneficiaries::where('sub_county',$request->search_by_subcounty)->where('payment_status',$request->searc_by_payment_only)->where('district',$request->search_by_district)->paginate('3000');
                }
                else{
                    $sum_total_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)
                    ->sum('Amount');
                    $sum_paid_amount =  0;
                    $sum_pending_amount = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)
                    ->sum('Amount');

                    $count_paid_in_a_search = 0;
                    $count_total_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)
                    ->count();
                    $count_pending_in_a_search = beneficiaries::where('sub_county',$request->search_by_subcounty)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)
                    ->count();
                    $all_beneficiaries=beneficiaries::where('sub_county',$request->search_by_subcounty)->where('payment_status',$request->searc_by_payment_only)->where('district',$request->search_by_district)->paginate('3000');
                }
            }
            //Search for District, Schedule, Payment Status
            elseif(empty($request->search_by_subcounty) && $request->search_by_schedule!=""  && $request->search_by_district != "" && $request->searc_by_payment_only !=""){
                if($request->searc_by_payment_only=='Paid'){
                    $sum_total_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)->sum('Amount');

                    $sum_paid_amount=beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)->sum('Amount');
                    $sum_pending_amount=0;
                    //return $sum_paid_amount;
                    $count_paid_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)->count();
                    $count_total_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)->count();
                    $count_pending_in_a_search =0;
                    $all_beneficiaries=beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->where('district',$request->search_by_district)->paginate('3000');
                    //return $count_total_in_a_search;
                }
                elseif($request->searc_by_payment_only=="Pending"){
                    $sum_total_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)->sum('Amount');
                    $sum_paid_amount = 0;
                    $sum_pending_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)->sum('Amount');
                    $count_paid_in_a_search = 0;
                    $count_total_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)
                    ->count();
                    $count_pending_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)
                    ->count();
                    $all_beneficiaries=beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->where('district',$request->search_by_district)
                    ->paginate('3000');
                    //return 0;
                }
                //return view('After.view_beneficiary',compact('all_beneficiaries','sum_total_amount','sum_pending_amount','sum_paid_amount','count_paid_in_a_search','count_pending_in_a_search','count_total_in_a_search'));

            }
            //return $count_paid_in_a_search;
            //Search for District, Schedule, Payment Status, Subcounty
            elseif($request->search_by_subcounty != "" && $request->search_by_schedule!=""  && $request->search_by_district != "" && $request->searc_by_payment_only !=""){
                if($request->searc_by_payment_only == "Paid"){
                    $sum_total_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->sum('Amount');
                    $sum_paid_amount =  beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->sum('Amount');
                    $sum_pending_amount = 0;

                    $count_paid_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status',$request->searc_by_payment_only)
                    ->count();
                    $count_total_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Paid')
                    ->count();
                    $count_pending_in_a_search = 0;
                    $all_beneficiaries=beneficiaries::where('Schedule',$request->search_by_schedule)->where('payment_status',$request->searc_by_payment_only)->where('district',$request->search_by_district)->paginate('3000');
                }
                elseif($request->searc_by_payment_only =='Pending'){
                    $sum_total_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->sum('Amount');
                    $sum_paid_amount =  0;
                    $sum_pending_amount = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->sum('Amount');

                    $count_paid_in_a_search = 0;
                    $count_total_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->count();
                    $count_pending_in_a_search = beneficiaries::where('Schedule',$request->search_by_schedule)
                    ->where('district',$request->search_by_district)
                    ->where('sub_county',$request->search_by_subcounty)
                    ->where('Schedule',$request->search_by_schedule)
                    ->where('payment_status','Pending')
                    ->count();
                    $all_beneficiaries=beneficiaries::where('Schedule',$request->search_by_schedule)->where('payment_status',$request->searc_by_payment_only)->where('district',$request->search_by_district)->paginate('3000');
            }
        }
        else{
            $count_paid_in_a_search =0;
            $sum_paid_amount =0;
            $count_total_in_a_search =0;
            $count_pending_in_a_search =0;
            $sum_pending_amount =0;
            $sum_total_amount =0;
            $all_beneficiaries = beneficiaries::paginate('3000');
        }
        return view('After.view_beneficiary',compact('all_beneficiaries','sum_total_amount','sum_pending_amount','sum_paid_amount','count_paid_in_a_search','count_pending_in_a_search','count_total_in_a_search'));
        }
    }
