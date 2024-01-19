<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ArtworkRepository;

#[Route('/', name: 'home_')]

class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ArtworkRepository $artworkRepository): Response
    {
        $artworks = $artworkRepository->findAll();
        return $this->render('home/index.html.twig', ['artworks' => $artworks]);
    }

    #[Route('/aboutUs', name: 'about_us')]
    public function show(): Response
    {
        return $this->render('home/aboutUs.html.twig');
    }
    #[Route('/gallery', name: 'gallery')]
    public function showGallery(ArtworkRepository $artworkRepository): Response
    {
        $artworks = $artworkRepository->findAll();

        return $this->render('home/gallery.html.twig', ['artworks' => $artworks]);
    }

    public function flashMessageSuccessConnection(SessionInterface $session): Response
    {
        $successMessage = $session->get('successConnection');
        return $this->render('base.html.twig', [
            'successMessage' => $successMessage,]);
    }
    #[Route('/artists', name: 'artists')]
    public function showArtists(): Response
    {
        return $this->render('home/artists.html.twig');
    }
    #[Route('/biography', name: 'biography')]
    public function showBiography(): Response
    {
        return $this->render('home/biography.html.twig');
    }
    #[Route('/mentions', name: 'mentions')]
    public function showMentions(): Response
    {
        return $this->render('home/mentions.html.twig');
    }
}
