<?php

class VideoStore
{
    private array $inventory;

    public function __construct(array $inventory = [])
    {
        $this->inventory = $inventory;
    }

    public function addVideo(Video $video): void
    {
        $this->inventory[] = $video;
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }

    public function listMoviesInStore(): array
    {
        $moviesInStore = [];
        foreach($this->inventory as $movie) {
            if($movie->isAvailable()) {
                $moviesInStore[] = $movie;
            }
        } return $moviesInStore;
    }

    public function listRentedMovies(): array
    {
        $rentedMovies = [];
        foreach($this->inventory as $movie) {
            if(!$movie->isAvailable()){
                $rentedMovies[] = $movie;
            }
        } return $rentedMovies;
    }

    public function rentVideo(string $title): void
    {
        foreach($this->inventory as $movie) {
            if($movie->getTitle() === $title && $movie->isAvailable()) {
                $movie->beingRented();
            }
        }
    }

    public function returnVideo(string $title): void
    {
        foreach($this->inventory as $movie) {
            if ($movie->getTitle() === $title && !$movie->isAvailable()) {
                $movie->beingReturned();
            }
        }
    }

    public function rateVideo(string $title, float $rating): void
    {
        foreach($this->inventory as $movie) {
            if ($movie->getTitle() === $title) {
                $movie->rateVideo($rating);
            }
        }
    }
}
