<?php
ob_start();
define('API_KEY','token');
$admin = "290241421";
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$editm = $update->edited_message;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$text1 = $message->text;
$fadmin = $message->from->id;
$file_o = __DIR__.'/users/'.$mid.'.json';
file_put_contents($file_o,json_encode($update->message->text));
chmod($file_o,0777);
if (isset($update->edited_message)){
  //$chat_id1 = $editm->chat->id;
  $eid = $editm->message_id;
  $edname = $editm->from->first_name;
  $jsu = json_decode(file_get_contents(__DIR__.'/users/'.$eid.'.json'));
  $text = "<b>".$edname."</b>\ndont edit your message
  You say:
".$jsu;
  $id = $update->edited_message->chat->id;
  bot('sendmessage',[
    'chat_id'=>$id,
    'reply_to_message_id'=>$eid,
    'text'=>$text,
    'parse_mode'=>'html'
  ]);
  $file_o = __DIR__.'/users/'.$eid.'.json';
  file_put_contents($file_o,json_encode($update->edited_message->text));
  //$up = file_get_contents(__DIR__.'/users/'.$eid.'.json');
  //str_replace("edited_message","message",$up);
}elseif(preg_match('/^\/([Ss]tart)/',$text1)){
  $text = "hi this is dont edit bot but you can play with me too press /play to play with me";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'admin','url'=>'https://telegram.me/nrsbott']
        ],
        [
          ['text'=>'admin','url'=>'https://telegram.me/nrsbott']
        ]
      ]
    ])
  ]);
}elseif(preg_match('/^\/([Pp]lay)/',$text1)){
  $text = "do you know the answer? 95 x 95 select your answer";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'9525','url'=>'false']
        ],
        [
          ['text'=>'9025','url'=>'true to play more press /playnext thanks']
        ]
      ]
    ])
  ]);
}elseif(preg_match('/^\/([Pp]laynext)/',$text1)){
  $text = "do you know the answer? 16 x 39 select your answer";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'624','url'=>'true to play more press /nextt thanks']
        ],
        [
          ['text'=>'610','url'=>'false']
        ]
      ]
    ])
  ]);
}elseif(preg_match('/^\/([Nn]extt)/',$text1)){
  $text = "do you know the answer? 157 x 183 select your answer";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'28731','url'=>'true but we have no games any more so just lets do another thing press /another to go to another world']
        ],
        [
          ['text'=>'25731','url'=>'false']
        ]
      ]
    ])
  ]);
}elseif(preg_match('/^\/([Aa]nother)/',$text1)){
  $text = "welcome to the new wolrd i called it no one knows ok now the question is this what language do yo speak select the answer";
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'persian','url'=>'ok now if you want to help me in translate call me @nrsbott thnks press /worldthree to play more games']
        ],
        [
          ['text'=>'french','url'=>'hi there if you can help me to improve my bot call me @nrsbott help me with translating press /worldthree to play more games']
        ],
        [
          ['text'=>'every thinf else','url'=>'just help me with the translating call me @nrsbott thnks select /worldthree to play more games']
        ]
      ]
    ])
  ]);
}elseif( $fadmin == $admin |  $fadmin == $admin2 and $update->message->text == '/stats'){
    $txtt = file_get_contents('member.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
  bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"members : $mmemcount 👤 "
    ]);

}elseif(isset($update->message-> new_chat_member )){
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"welcome,follow the rules so you dont get kicked"
    ]);
}
  
  
  
  
  
  
  
$txxt = file_get_contents('member.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('member.txt');
      $aaddd .= $chat_id."\n";
      file_put_contents('member.txt',$aaddd);
    }
