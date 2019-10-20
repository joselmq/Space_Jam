<?php

namespace App\Http\Controllers;

use App\Services\NasaImagesService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ImageController extends Controller
{
    private $nasaImagesSrv;
    public function __construct(NasaImagesService $nasaImagesSrv)
    {
        $this->nasaImagesSrv = $nasaImagesSrv;
    }

    public function getImage()
    {
        $id = $this->nasaImagesSrv->getNasaImageId();

        $urlAPI = 'https://images-api.nasa.gov/search?nasa_id=' . $id;
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
                return response()->json([], 404);
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
                'originalImage' => url("images/{$timestamp}.png"),
            ];

        }

        return response()->json($info, 200);
    }
}
