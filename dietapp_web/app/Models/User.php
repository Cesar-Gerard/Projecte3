<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public $table = "users";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name_user',
        'lastname_user',
        'nickname_user',
        'password',
        'type_user',
        'email_user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public static function getUserByNickname($nickname){

        return User::where('nickname_user','=',$nickname)->first();

    }

    public static function getUserByEmail($email){

        return User::where('email_user','=',$email)->first();

    }

    public static function getUserById($id){
        return User::where('id','=',$id)->first();
    }


    public static function updatePassword(User $user, $password){
        $user->password = bcrypt($password);
        return $user->save();
        
    }


    public static function editUser($data){
        try{

            \DB::beginTransaction();

            $user = User::getUserById($data->id);

            if($user!=null){

                $user->name_user = $data->pacient_name;
                $user->lastname_user = $data->pacient_cognoms;
                $user->email_user = $data->pacient_email;
    
                $user->save();
    
    
    
                $pacient = Pacient::getPacientById($data->id);
                if($pacient!=null){

                    $pacient->phone_pacient = $data->pacient_phone;
                    $pacient->address_pacient = $data->pacient_address;
                    
                    $pacient->save();

                    \DB::commit();
                    return 1;
                }
            }

            return -1;

        }catch(\Illuminate\Database\QueryException $ex){
            echo "DB: ".$ex;
            \DB::rollback();
            return -1;
        }catch(\Throwable $ex){
            echo $ex;
            \DB::rollback();
            return -1;
        }
    }

    public static function addUser($data,$nutricionist){

        try{

            \DB::beginTransaction();

            $user = new User();

            $user->name_user = $data->pacient_name;
            $user->lastname_user = $data->pacient_cognoms;
            $user->nickname_user = $data->pacient_username;
            $user->password = bcrypt($data->pacient_password);
            $user->type_user = "P";
            $user->email_user = $data->pacient_email;

            $user->save();


            $pacient = new Pacient();
            $pacient->id_pacient = $user->id;
            $pacient->assigned_nutricionist = $nutricionist;
            $pacient->phone_pacient = $data->pacient_phone;
            $pacient->address_pacient = $data->pacient_address;
            
            $pacient->save();

            \DB::commit();

            return  1;
        }catch(\Illuminate\Database\QueryException $ex){
            echo "DB: ".$ex;
            \DB::rollback();
            return -1;
        }catch(\Throwable $ex){
            echo $ex;
            \DB::rollback();
            return -1;
        }

    }



}