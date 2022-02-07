<?php

class Video
{
    private string $title;
    private ?bool $isAvailable = true;
    private array $allRatings = [];

    public function __construct(string $title, ?float $rating=null)
    {
        $this->title = $title;
        $this->allRatings[] = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function rateVideo(float $rating): void
    {
        $this->allRatings[] = $rating;
    }

    public function getRating(): ?string
    {
        if(count($this->allRatings) === 0){
            return 0;
        }
        return round(array_sum($this->allRatings) / count($this->allRatings),1);
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function beingRented(): void
    {
        $this->isAvailable = false;
    }

    public function beingReturned(): void
    {
        $this->isAvailable = true;
    }
}