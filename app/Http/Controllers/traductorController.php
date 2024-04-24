<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class traductorController extends Controller
{
    public function translate(Request $request)
    {
        $text = $request->input('text');
        $targetLang = $request->input('target_lang');

        $response = $this->translateText($text, $targetLang);

        return response()->json(['translation' => $response]);
    }

    private function translateText($text, $targetLang)
    {
        $apiKey = "";

        $url = "https://api-free.deepl.com/v2/translate";
        $data = [
            'auth_key' => $apiKey,
            'text' => $text,
            'target_lang' => $targetLang
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        curl_close($ch);

        $translated = json_decode($response, true);
        return $translated['translations'][0]['text'];
    }
}
