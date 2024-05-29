<?php

class Song2
{

    private $rank = 0;
    private $title = "";
    private $artist = "";
    private $album = "";
    private $year = 0;

    public function __construct($element)
    {
        $this->rank = $element["rank"];
        $this->title = $element["title"];
        $this->artist = $element["artist"];
        $this->album = $element["album"];
        $this->year = $element["year"];
    }

    //METHODE
    public function __toString()
    {
        return "le single : " . $this->title . " de l'album : " . $this->album . " de " . $this->artist . " sortis en " . $this->year . " est classé : " . $this->rank;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function getAlbum()
    {
        return $this->album;
    }

    public function getYear()
    {
        return $this->year;
    }


}