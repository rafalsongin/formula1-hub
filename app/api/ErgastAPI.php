<?php
class ErgastAPI {
    private string $baseUrl = 'https://ergast.com/api/f1';
    private string $year = '2023';

    public function getDrivers() {
        $url = $this->baseUrl . '/' . $this->year . '/drivers.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return $data['MRData']['DriverTable']['Drivers'];
    }
    
    public function getRaces() {
        $year = date('Y');
        $url = $this->baseUrl . '/' . $year . '.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        return $data['MRData']['RaceTable']['Races'];
    }
}
