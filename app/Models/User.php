<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'name_kana',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getNameKanaAttribute()
    // {
    //     return $this->attributes['name_kana'];
    // }

    // public function setNameKanaAttribute($value)
    // {
    //     $this->attributes['name_kana'] = $value;
    // }

    //ここから追加
    public function grade()
    {
    return $this->belongsTo(Grade::class);
    }

    public static function validateProfile(array $data, $userId)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nameKana' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
        ], [
            'name.required' => 'ユーザーネームは必須です。',
            'nameKana.required' => 'カナは必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email' => '正しいメールアドレスを入力してください。',
            'email.unique' => 'このメールアドレスは既に登録されています。',
        ]);
    }

    public function updateProfile($validated_data)
    {
        $this->name = $validated_data['name'];
        $this->name_kana = $validated_data['nameKana']; 
        $this->email = $validated_data['email'];
        if (isset($validated_data['profileImage'])) {
            $this->profile_image = $validated_data['profileImage'];
        }
        $this->save();
    }

    public static function validatePassword(array $data)
    {
        return Validator::make($data, [
            'currentPassword' => ['required'],
            'newPassword' => ['required', 'min:8'],
            'newPasswordConfirmation' => ['required', 'same:newPassword'],
        ], [
            'currentPassword.required' => '現在のパスワードは必須です。',
            'newPassword.required' => '新しいパスワードは必須です。',
            'newPassword.min' => '新しいパスワードは最低8文字必要です。',
            'newPasswordConfirmation.required' => '新しいパスワードの確認は必須です。',
            'newPasswordConfirmation.same' => '新しいパスワードが確認欄と一致しません。',
        ]);
    }

    public function updatePassword($new_password)
    {
        $this->password = Hash::make($new_password);
        $this->save();
    }
}
