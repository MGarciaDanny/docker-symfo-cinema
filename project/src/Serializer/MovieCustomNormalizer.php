<?php

namespace App\Serializer;

use App\Entity\Movie;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class MovieCustomNormalizer implements NormalizerInterface
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        $RAPIDAPI_KEY = '05d0a93658mshdc80f9f1822ee21p1f70e1jsnb2d28b54f704';
        $RAPIDAPI_HOST = 'moviesdatabase.p.rapidapi.com';
        $MOVIE_DATABASE_URL = '/titles/search/title/';
        $RAPIDAPI_SEARCH = 'https://' . $RAPIDAPI_HOST . $MOVIE_DATABASE_URL;
        $titleParts = explode(" ", $object->getTitle());
        $lastTitle = array_pop($titleParts); // Je recupère le dernier élement pour faciliter la recherche sur cette api...
        $searchUrl = $RAPIDAPI_SEARCH . $lastTitle . '?exact=false';

        $newPicture = '';
        try {
            $response = $this->client->request(
                'GET',
                $searchUrl,
                [
                    'headers' => [
                        'X-RapidAPI-Key' => $RAPIDAPI_KEY,
                        'X-RapidAPI-Host' => $RAPIDAPI_HOST
                    ],
                ]
            );

            // Obtenez le contenu de la réponse
            $content = $response->toArray();
            if (isset($content['error'])) {
                $newPicture = $content['error'];
            } else {
                $newPicture = $content['results'][0]['primaryImage']['url'] ?? 'non trouvé par l\'api';
            }
        } catch (\Exception $e) {
            // Gérer l'exception
            $newPicture = 'erreur lors de la récupération de l\'image';
        }

        $data = [
            'id' => $object->getId(),
            'title' => $object->getTitle(),
            'duration' => $object->getDuration(),
            'picture' => $newPicture
        ];

        return $data;
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof Movie;
    }
}
