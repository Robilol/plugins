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
            echo "<pre>";
            print_r($data);

        }
    }
}