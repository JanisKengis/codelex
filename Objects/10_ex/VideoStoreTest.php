<?php

class VideoStoreTest
{
    private VideoStore $store;

    public function __construct(VideoStore $store)
    {
        $this->store = $store;
    }

    public function testForAdding(): void
    {
        $this->store->addVideo(new Video("The Matrix"));
        $this->store->addVideo(new Video("Godfather II"));
        $this->store->addVideo(new Video("Star Wars Episode IV: A New Hope"));

        echo 'Testing for adding new Videos to store: '.PHP_EOL;

        foreach($this->store->getInventory() as $video) {
            echo 'Title: ' . $video->getTitle().PHP_EOL;
        } echo PHP_EOL;
    }

    public function giveSeveralRatings(): void
    {
        echo 'Testing for rating each video several times: '.PHP_EOL;
        echo PHP_EOL;
        foreach($this->store->getInventory() as $video) {
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().PHP_EOL;
            $video->rateVideo(7.5);
            $video->rateVideo(10);
            $video->rateVideo(3.7);
            echo 'After giving ratings: '.PHP_EOL;
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().PHP_EOL;
            echo PHP_EOL;
        }
    }

    public function testForRentingAndReturning(): void
    {
        echo 'Test for renting videos: '.PHP_EOL;
        echo PHP_EOL;
        echo 'Inventory before renting: '.PHP_EOL;

        foreach($this->store->getInventory() as $video) {
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().
                ' -- available: '.($video->isAvailable() ? 'Yes' : 'No').PHP_EOL;
            $this->store->rentVideo($video->getTitle());
        } echo PHP_EOL;

        echo 'Inventory after renting out video: '.PHP_EOL;
        foreach($this->store->getInventory() as $video) {
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().
                ' -- available: '.($video->isAvailable() ? 'Yes' : 'No').PHP_EOL;
        } echo PHP_EOL;

        echo 'Test for returning videos: '.PHP_EOL;
        echo 'Inventory before returning: '.PHP_EOL;
        foreach($this->store->getInventory() as $video) {
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().
                ' -- available: '.($video->isAvailable() ? 'Yes' : 'No').PHP_EOL;
            $this->store->returnVideo($video->getTitle());
        } echo PHP_EOL;

        echo 'Inventory after returning video: '.PHP_EOL;
        foreach($this->store->getInventory() as $video) {
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().
                ' -- available: '.($video->isAvailable() ? 'Yes' : 'No').PHP_EOL;
        } echo PHP_EOL;
    }

    public function testListingInventory(): void
    {
        echo 'Inventory before renting GodFather II: '.PHP_EOL;

        foreach($this->store->getInventory() as $video) {
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().
                ' -- available: '.($video->isAvailable() ? 'Yes' : 'No').PHP_EOL;
        } echo PHP_EOL;

        $this->store->rentVideo('Godfather II');

        echo 'Inventory after renting GodFather II: '.PHP_EOL;
        foreach($this->store->listMoviesInStore() as $video) {
            echo 'Title: '. $video->getTitle(). ' -- rating: '. $video->getRating().
                ' -- available: '.($video->isAvailable() ? 'Yes' : 'No').PHP_EOL;
        } echo PHP_EOL;
    }
}