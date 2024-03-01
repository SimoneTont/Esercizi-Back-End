<?php
require_once 'functions.php';

class Form
{
    private $age;
    private $description;
    private $like;

    public function __construct($age = "", $description = "", $like = "")
    {
        $this->age = $age;
        $this->description = $description;
        $this->like = $like;
    }

    public function render($userLanguage)
    {
        //Form italiano
        if ($userLanguage === 'italian') {
            return '<form method="post" lang="' . $userLanguage . '">
            <div class="mb-3">
                <label for="age">Quanti anni hai?</label>
                <input type="number" class="form-control" id="age" name="age" value="' . $this->age . '">
            </div>
            <div class="mb-3">
                <label for="description">Parlaci di te</label>
                <textarea class="form-control" id="description" name="description" rows="3">' . $this->description . '</textarea>
            </div>
            <div class="mb-3">
                <label for="like">Ti piace il nostro sito web?</label>
                <select class="form-select" id="like" name="like">
                    <option value="yes"' . ($this->like == 'yes' ? ' selected' : '') . '>Sì</option>
                    <option value="no"' . ($this->like == 'no' ? ' selected' : '') . '>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
        </form>';
        }  
        //Form inglese
        else if ($userLanguage === 'english') 
        {
            return '
            <form method="post" lang="' . $userLanguage . '">
                <div class="mb-3">
                    <label for="age">How old are you?</label>
                    <input type="number" class="form-control" id="age" name="age" value="' . $this->age . '">
                </div>
                <div class="mb-3">
                    <label for="description">Tell us about you</label>
                    <textarea class="form-control" id="description" name="description" rows="3">' . $this->description . '</textarea>
                </div>
                <div class="mb-3">
                    <label for="like">Do you like our website?</label>
                    <select class="form-select" id="like" name="like">
                        <option value="yes"' . ($this->like == 'yes' ? ' selected' : '') . '>Yes</option>
                        <option value="no"' . ($this->like == 'no' ? ' selected' : '') . '>No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        ';
        } 
        //Form francese
        else if ($userLanguage === 'french') 
        {
            return '<form method="post" lang="' . $userLanguage . '">
            <div class="mb-3">
                <label for="age">Quel âge as-tu ?</label>
                <input type="number" class="form-control" id="age" name="age" value="' . $this->age . '">
            </div>
            <div class="mb-3">
                <label for="description">Parle-nous de toi</label>
                <textarea class="form-control" id="description" name="description" rows="3">' . $this->description . '</textarea>
            </div>
            <div class="mb-3">
                <label for="like">Aimes-tu notre site web ?</label>
                <select class="form-select" id="like" name="like">
                    <option value="yes"' . ($this->like == 'yes' ? ' selected' : '') . '>Oui</option>
                    <option value="no"' . ($this->like == 'no' ? ' selected' : '') . '>Non</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>';
        }
        //Errore
        else 
        {
            return "Error";
        }
    }
}
