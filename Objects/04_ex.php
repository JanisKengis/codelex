<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle():string
    {
        return $this->title;
    }

    public function getStudio():string
    {
        return $this->studio;
    }

    public function getRating():string
    {
        return $this->rating;
    }
}


class MovieRegister
{
    private array $movies;
    private array $pgSorted = [];
    private Movie $film;


    public function addMovie(Movie $film)
    {
        $this->movies[] = $film;
    }


    public function getMovies():array
    {
        return $this->movies;
    }

    public function getPG():array
    {
        foreach($this->movies as $movie)
        {
            if($movie->getRating() == 'PG')
            {
                $this->pgSorted[]=$movie;
            }
        } return $this->pgSorted;
    }

}

$movies = new MovieRegister();
$movies->addMovie(new Movie('Casino Royale', 'Eon Productions', 'PG13'));
$movies->addMovie(new Movie('Glass', 'Buena Vista International', 'PG13'));
$movies->addMovie(new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'));

foreach($movies->getPG() as $movie){
    echo 'Title: '.$movie->getTitle().PHP_EOL;
    echo 'Studio: '.$movie->getStudio().PHP_EOL;
    echo 'Rating: '.$movie->getRating().PHP_EOL;
}



