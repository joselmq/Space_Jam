<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ImageController extends Controller
{
    public function getImage()
    {
        $urlAPI = 'https://images-api.nasa.gov/search?q=hurricanes';
        $client = new Client();
        $response = $client->request('GET', $urlAPI);
        $data = json_decode((string)$response->getBody(), true);
        
        $info = [];
        if (count($data['collection']['items'])) {
            $images = $data['collection']['items'];
            $imageIndex = array_rand($images);

            $image = $images[$imageIndex];

            $urlImage = $image['links'][0]['href'];
            $timestamp = time();
            $fileName = './images/' . $timestamp . '.png';

            $process = new Process("python3 ./../../main.py \"{$urlImage}\" \"{$fileName}\" ");
            $process->run();

            // executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $info = [
                'images' => [
                    url("/images/{$timestamp}_02_01.png"),
                    url("/images/{$timestamp}_01_01.png"),
                    url("/images/{$timestamp}_01_02.png"),
                    url("/images/{$timestamp}_02_02.png"),
                ],
                'info' => [
                    'title' => $image['data'][0]['title'],
                    'description' => $image['data'][0]['description'],
                    'created_at' => $image['data'][0]['date_created'],
                ],
                'originalImage' => url("/images/{$fileName}"),
            ];

        }

        return response()->json($info, 200);
    }
}
