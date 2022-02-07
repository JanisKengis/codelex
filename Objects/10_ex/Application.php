<?php

class Application
{
    private VideoStore $store;

    public function __construct(VideoStore $store)
    {
        $this->store = $store;
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $movieTitle = readline('Enter the title of video: ');
                    $movie = new Video($movieTitle);
                    $this->addMovies($movie);
                    break;
                case 2:
                    echo 'Available videos: '.PHP_EOL;
                    $this->listAvailableInventory();
                    $rentVideoTitle = readline('Please enter title of video You want to rent: ');
                    $this->rentVideo($rentVideoTitle);
                    break;
                case 3:
                    echo 'Rented out videos:'.PHP_EOL;
                    $this->listRentedInventory();
                    $returnVideoTitle = readline('Please enter title of video You want to return: ');
                    $this->returnVideo($returnVideoTitle);
                    $rating = (float)readline('Please rate the video (1-10): ');
                    $this->store->rateVideo($returnVideoTitle, $rating);
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(Video $title): void
    {
        $this->store->addVideo($title);
    }

    private function rentVideo(string $title): void
    {
        $this->store->rentVideo($title);
    }

    private function returnVideo(string $title): void
    {
        $this->store->returnVideo($title);
    }

    private function listInventory(): void
    {
        foreach ($this->store->getInventory() as $movie) {
            echo 'Title: ' . $movie->getTitle() . ' -- average user rating: ' . $movie->getRating() .
                ' -- available: ' . ($movie->isAvailable() ? 'Yes' : 'No').PHP_EOL;
        } echo PHP_EOL;
    }

    private function listAvailableInventory(): void
    {
        foreach ($this->store->listMoviesInStore() as $movie) {
            echo 'Title: ' . $movie->getTitle() . ' -- average user rating: ' . $movie->getRating().PHP_EOL;
        } echo PHP_EOL;
    }

    private function listRentedInventory(): void
    {
        foreach ($this->store->listRentedMovies() as $movie) {
            echo 'Title: ' . $movie->getTitle() . ' -- average user rating: ' . $movie->getRating().PHP_EOL;
        } echo PHP_EOL;
    }
}
