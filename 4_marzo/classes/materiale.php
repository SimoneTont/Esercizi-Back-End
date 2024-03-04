<?php

namespace Materiale {

    abstract class MaterialeBibliotecario
    {

        private static $count = 0;
        public $titolo;
        public $annoPubblicazione;

        // Costruttore della superclasse
        function __construct($titolo, $annoPubblicazione)
        {
            echo 'Sono il costruttore della superclasse MaterialeBibliotecario';
            $this->titolo = $titolo;
            $this->annoPubblicazione = $annoPubblicazione;
            self::$count++;
        }

        public static function contatoreMateriali()
        {
            return self::$count;
        }
    }
    class Dvd extends MaterialeBibliotecario
    {
        private static $countDvd = 0;
        public $regista;
        function __construct($regista, $annoPubblicazione, $titolo)
        {
            parent::__construct($annoPubblicazione, $titolo); // Richiamo il costruttore della superclasse
            $this->regista = $regista;
            self::$countDvd++;
        }
        public static function contatoreDvd()
        {
            return self::$countDvd;
        }
    }
    class Libro extends MaterialeBibliotecario
    {
        private static $countLibri = 0;
        public $autore;
        function __construct($autore, $annoPubblicazione, $titolo)
        {
            parent::__construct($annoPubblicazione, $titolo); // Richiamo il costruttore della superclasse
            $this->autore = $autore;
            self::$countLibri++;
        }
        public static function contatoreLibri()
        {
            return self::$countLibri;
        }
    }
}
