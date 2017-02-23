<?php

class LolStatsTracker
{
    private $key = "cf25944d-4f1e-4619-a782-a45e293a2046";
    private $user;
    private $region;
    private $id;

    private $regionConversion = array(  'euw'   => 'EUW1',
                                        'na'    => 'NA1',
                                        'br'    => 'BR1',
                                        'eun'   => 'EUN1',
                                        'jp'    => 'JP1',
                                        'oc'    => 'OC1',
                                        'pbe'   => 'PB1',
                                        'tr'    => 'TR1');

    private $spellConversion = array(   1   => 'Purge',
                                        3   => 'Fatigue',
                                        4   => 'Saut Eclair',
                                        6   => 'Fantome',
                                        7   => 'Soins',
                                        11  => 'Chatiment',
                                        12  => 'Teleportation',
                                        13  => 'Clarte',
                                        14  => 'Embrasement',
                                        21   => 'Barriere',
                                        32   => 'Marquage');

    private $championConversion = array(    266 => "Aatrox",
                                            412 => "Thresh",
                                            23 => "Tryndamere",
                                            79 => "Gragas",
                                            69 => "Cassiopeia",
                                            136 => "Aurelion Sol",
                                            13 => "Ryze",
                                            14 => "Sion",
                                            1 => "Annie",
                                            78 => "Poppy",
                                            202 => "Jhin",
                                            9 => "Fiddlesticks",
                                            43 => "Karma",
                                            111 => "Nautilus",
                                            240 => "Kled",
                                            99 => "Lux",
                                            103 => "Ahri",
                                            2 => "Olaf",
                                            164 => "Camille",
                                            112 => "Vicktor",
                                            34 => "Anivia",
                                            27 => "Singed",
                                            86 => "Garen",
                                            127 => "Lissandra",
                                            57 => "Maokai",
                                            25 => "Morgana",
                                            28 => "Evelynn",
                                            105 => "Fizz",
                                            74 => "Heimerdinger",
                                            238 => "Zed",
                                            68 => "Rumble",
                                            82 => "Mordekayser",
                                            37 => "Sona",
                                            96 => "Kog Maw",
                                            55 => "Katarina",
                                            117 => "Lulu",
                                            22 => "Ashe",
                                            30 => "Karthus",
                                            12 => "Alistar",
                                            122 => "Darius",
                                            67 => "Vayne",
                                            110 => "Varus",
                                            77 => "Udyr",
                                            89 => "Leona",
                                            126 => "Jayce",
                                            134 => "Syndra",
                                            80 => "Pantheon",
                                            92 => "Riven",
                                            121 => "Kha'Zix",
                                            42 => "Corki",
                                            268 => "Azir",
                                            51 => "Caitlynn",
                                            76 => "Nidalee",
                                            85 => "Kennen",
                                            3 => "Galio",
                                            45 => "Veigar",
                                            432 => "Bard",
                                            150 => "Gnar",
                                            90 => "Malzahar",
                                            104 => "Graves",
                                            254 => "Vi",
                                            10 => "Kayle",
                                            39 => "Irelia",
                                            64 => "Lee Sin",
                                            420 => "Illaoi",
                                            60 => "Elise",
                                            106 => "Volibear",
                                            20 => "Nunu",
                                            4 => "Twisted Fate",
                                            24 => "Jax",
                                            102 => "Shyvana",
                                            429 => "Kalista",
                                            36 => "Dr Mundo",
                                            427 => "Ivern",
                                            131 => "Diana",
                                            223 => "Tahm Kench",
                                            63 => "Brand",
                                            113 => "Sejuani",
                                            8 => "Vladimir",
                                            154 => "Zac",
                                            421 => "Rek'Sai",
                                            133 => "Quinn",
                                            84 => "Akali",
                                            163  => "Taliyah",
                                            18 => "Tristana",
                                            120 => "Hecarim",
                                            15 => "Sivir",
                                            236 => "Lucian",
                                            107 => "Rengar",
                                            19 => "Warwwick",
                                            72 => "Skarner",
                                            54 => "Malphite",
                                            157 => "Yasuo",
                                            101 => "Xerath",
                                            17 => "Teemo",
                                            75 => "Nasus",
                                            58 => "Renekton",
                                            119 => "Draven",
                                            35 => "Shaco",
                                            50 => "Swain",
                                            91 => "Talon",
                                            40 => "Janna",
                                            115 => "Ziggs",
                                            245 => "Ekko",
                                            61 => "Orianna",
                                            114 => "Fiora",
                                            31 => "Cho Gath",
                                            33 => "Rammus",
                                            7 => "Leblanc",
                                            16 => "Soraka",
                                            26 => "Zilean",
                                            56 => "Nocturne",
                                            222 => "Jinx",
                                            83 => "Yorick",
                                            6 => "Urgot",
                                            203 => "Kindred",
                                            21 => "Miss Fortune",
                                            62 => "Wukong",
                                            53 => "Blitzcrank",
                                            98 => "Shen",
                                            201 => "Braum",
                                            5 => "Xin Zhao",
                                            29 => "Twitch",
                                            11 => "Master Yi",
                                            44 => "Taric",
                                            32 => "Amumu",
                                            41 => "Gangplank",
                                            48 => "Trundle",
                                            38 => "Kassadin",
                                            161 => "Vel'Koz",
                                            143 => "Zyra",
                                            267 => "Nami",
                                            59 => "Jarvan IV",
                                            81 => "Ezreal");


    function __construct($user, $region)
    {
        $this->user     = $user;
        $this->region   = $region;
        $this->id       = $this->setUserId();
    }

    /**
     * Gets the value of key.
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Sets the value of key.
     *
     * @param mixed $key the key
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of region.
     *
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Sets the value of region.
     *
     * @param mixed $region the region
     *
     * @return self
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setUserId()
    {
        $link = "https://euw.api.pvp.net/api/lol/".$this->region."/v1.4/summoner/by-name/".$this->user."?api_key=".$this->getKey();
        $link = str_replace(" ", "%20", $link);
        $data = file_get_contents($link, true);
        $data = json_decode($data);

        foreach ($data as $user) {
            return $user->id;
        }
    }

    public function getCurrentGame()
    {
        var_dump($this->regionConversion);
        var_dump($this->region);
        $link = "https://euw.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/".$this->regionConversion[$this->region]."/".$this->id."?api_key=".$this->getKey();

        if (@file_get_contents($link, true) === false) {
            echo "Partie non trouvée";
            return;
        } else {
            $data = file_get_contents($link, true);
            $data = json_decode($data);
            $y = 0;
            while ($y < 10)
            {
                $player[$y]["name"] = $data->participants[$y]->summonerName;
                $player[$y]["team"] = $data->participants[$y]->teamId;
                $spell1 = $data->participants[$y]->spell1Id;
                $player[$y]["spell1"] = $this->spellConversion[$spell1];
                $spell2 = $data->participants[$y]->spell2Id;
                $player[$y]["spell2"] = $this->spellConversion[$spell2];
                $champion = $data->participants[$y]->championId;
                $player[$y]["champion"] = $this->championConversion[$champion];
                $y++;
            }
            $y = 0;
            while ($y < 6)
            {
                $player["banned"] = array($y = array( "champion" => $data->bannedChampions[$y]->championId,
                                                          "team" => $data->bannedChampions[$y]->teamId));
                $y++;
            }
            echo "<pre>";
            print_r($player);

            return $player;
        }
    }
}