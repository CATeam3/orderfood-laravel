<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
//    use HasFactory;

    const React = 1;
    public static function reactToken(){
        # code
        $token = ApiToken::findOrNew(ApiToken::React);
        if (!$token->id){
            $token->id = ApiToken::React;
            $token->name = 'ReactFront';
            $token->token = base64_encode('cateam3');
            $token->save();
        }
        return $token;
    }
}
