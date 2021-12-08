<?php

namespace App\Quiz\Admin\RequestLogin;

use App\Quiz\Admin\Model\Tokens;
use Illuminate\Support\Facades\DB;

class TokenRepository {
    public function create($data) {
        // dd($data);
        $token = new Tokens();
        $token->users_id = $data->userId;
        $token->token = $data->token;
        $token->exptime = DB::Raw('ADDTIME(UTC_TIMESTAMP(), "' . $data->expTime . '")');
        $token->requestedFromIP = DB::Raw('INET_ATON("'. $data->requestedFromIP . '")');
        $token->save();
    }
}