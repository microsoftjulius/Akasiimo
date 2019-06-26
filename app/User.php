<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\beneficiaries;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','Role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function count_number_of_beneficiaries(){
        $number_of_beneficiaries = beneficiaries::count();
        return $number_of_beneficiaries;
    }
    public function count_number_of_paid_beneficiaries(){
        $number_of_paid = beneficiaries::where('payment_status','Paid')->count();
        return $number_of_paid;
    }
    public function count_number_of_Not_paid_beneficiaries(){
        $number_of_not_paid = beneficiaries::where('payment_status','Pending')->count();
        return $number_of_not_paid;
    }
    public function calculate_total_amount_of_money(){
        $total_amount_paid = beneficiaries::sum('Amount');
        return $total_amount_paid;
    }
    public function calculate_total_amount_of_money_paid(){
        $total_amount_paid = beneficiaries::where('payment_status','Paid')->sum('Amount');
        return $total_amount_paid;
    }
    public function calculate_total_amount_of_money_pending(){
        $total_amount_paid = beneficiaries::where('payment_status','Pending')->sum('Amount');
        return $total_amount_paid;
    }
    public function count_users(){
        $total_number_of_users = DB::table('users')->count();
        return $total_number_of_users;
    }
    public function count_paid_in_percentage(){
        $total_amount_paid = beneficiaries::where('payment_status','Paid')->sum('Amount');
        $total_amount_of_money = beneficiaries::sum('Amount');
        $paid_percentage = ($total_amount_paid/$total_amount_of_money)*100;
        return round($paid_percentage,2);
    }
    public function count_pending_in_percentage(){
        $total_amount_pending = beneficiaries::where('payment_status','Pending')->sum('Amount');
        $total_amount_of_money = beneficiaries::sum('Amount');
        $paid_percentage = ($total_amount_pending/$total_amount_of_money)*100;
        return round($paid_percentage,2);
    }
    public function get_districts_and_amount(){
        $district = beneficiaries::select(DB::raw('district,COUNT(*) as Number,SUM(Amount) as Amount'))->groupBy('district')->paginate('5');
        return $district;
    }
    public function get_count_paid_per_district(){
        return $paid_people;
    }
    public function plot_bar_graph(){
        $schedules = ploting::all();
        $my_amounts = array();
        foreach($schedules as $schedule){
            array_push($my_amounts,$schedule->SCHEDULE);
        }
        return $my_amounts;
    }
    public function plot_bar_schedules(){
        $schedules = ploting::all();
        $my_schedules = array();
        foreach($schedules as $schedule){
            array_push($my_schedules,$schedule->SCHEDULE);
        }
        return $my_schedules;
    }
}
