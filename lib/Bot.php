<?php
namespace d52b8\telegram;

class Bot 
{
    private $token;
    private $chat_id;

    public function __construct($config) 
    {
        $this->token = isset($config['token']) ? $config['token'] : null;
        $this->chat_id = isset($config['chat_id']) ? $config['chat_id'] : null;
    }

    public function sendMessage($message)
    {
        try {
            $uri = $this->uri($message);
            $response = $this->request($uri);
            return $response;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function request($uri) 
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $uri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    private function uri($message) {
        return join('/', [
            $this->uriHost(),
            $this->uriToken(),
            $this->uriSendMessageQuery($message)
        ]);
    }

    private function uriHost() {
        return "https://api.telegram.org";
    }

    private function uriToken() {
        return "bot{$this->token}";
    }

    private function uriSendMessageQuery($message) {
        return 'sendMessage?' . http_build_query([
            'chat_id' => $this->chat_id,
            'parse_mode' => 'html',
            'text' => $message
        ]);
    }
}
