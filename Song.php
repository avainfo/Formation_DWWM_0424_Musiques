<?php

class Song
{
    private $rank;
    private $title;
    private $artist;
    private $album;
    private $year;

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

    public function getYears()
    {
        return $this->year;
    }

    //CONSTRUCTEUR
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

    public function toHTML() {
        return "";
    }

}